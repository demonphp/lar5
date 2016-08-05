<?php

namespace App\Http\Controllers\Admin;


use App\Models\Permission;
use Illuminate\Support\Facades\File;

use App\Models\Common\BuildTreeArray;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\BlogArt;
use Validator,Image,Excel;

class PermissionController extends Controller
{
    protected $view_path = 'admin.manager.permission';

    /*
     * @param1	$request
     */
    public function anyList(Request $request)
    {
        $page = $request->input('numPerPage',20);
        $name = $request->input('name','');

        $op = new Permission();
        if(!empty($name)) {
            $op  = $op->where('name','LIKE','%'.$name .'%');
        }

        $list = $op->paginate($page)->toArray();
        return view($this->view_path.'.list')->with(['list'=>$list]);
    }

    /*
     * @desc 返回添加或修改的页面
     */
    public function getEdit($id) {
        if(!empty($id)) {
            $permission = Permission::whereId($id)->first();

            if(!is_null($permission->parent_id)){ // 如果不是顶级分类
                $disabledIds = $permission->getSiblingsAndSelf(['id'])->toArray(); // 当前分类的父类的所有子类,禁用
                $disabledIdsArr = array_flatten($disabledIds);
            }else{
                $pid = $permission->id;
                $disabledIds = $permission->getDescendants(['id'])->toArray();
                array_unshift( $disabledIds ,['id'=>$pid] );
                $disabledIdsArr = array_flatten($disabledIds);
            }
        }else {
            $permission = [];
        }
        $permissionsTree = Permission::getNestedList('display_name','id','└'); // 获取所有节点树

//        return $permission;
        return view($this->view_path.'.edit')->with(['data'=>$permission,'tree'=>$permissionsTree]);
    }

    /*
     * @desc 树查找带回
     */
    public function anyTreeLookup($id = 1) {
//        $data = Permission::get();

        $permission = Permission::whereId($id)->first();
        $permissionsTree = Permission::getNestedList('display_name','id','└'); // 获取所有节点树
        if(!is_null($permission->parent_id)){ // 如果不是顶级分类
            $disabledIds = $permission->getSiblingsAndSelf(['id'])->toArray(); // 当前分类的父类的所有子类,禁用
            $disabledIdsArr = array_flatten($disabledIds);
        }else{
            $pid = $permission->id;
            $disabledIds = $permission->getDescendants(['id'])->toArray();
            array_unshift( $disabledIds ,['id'=>$pid] );
            $disabledIdsArr = array_flatten($disabledIds);
        }

        return $disabledIds;

//        $bta = new BuildTreeArray($data,'id','parent_id',0);
//        $list = $bta->getTreeArray();
//        return $list;
//        $list = json_encode($list);
        return view($this->view_path.'.treeLookup')->with(['data'=>$list]);
    }

    /*
     * @desc 更新或者添加分类
     */
    public function postSave(Request $request)
    {
        $rules = [
            'name'              => 'required',
            'title'             => 'required',
            'keywords'          => 'required',
            'description'       => 'required',
            'content'           => 'required',
            'cate_id'           => 'required',
            'author'            => 'required',
        ];

         $message = array(
            "required"  => ":attribute 不能为空",
            "between"   => ":attribute 长度必须在 :min 和 :max 之间"
        );

         $attributes = array(
             'name'              => '分类名',
             'title'             => '标题',
             'keywords'          => '关键字',
             'description'       => '描述',
             'content'           => '内容',
             'cate_id'           => '所属分类',
             'author'            => '作者',
         );

        $columns = array('id','name','title','keywords','description','content','thumb','view','order','cate_id','author','addtime');
        $validator = Validator::make($request->all(), $rules, $message, $attributes);
        if ($validator->fails()) {
            return error($validator->messages()->first());
        }
        $data = array_only($request->all(),$columns);

        //1.设置文件上传
        if(isset($_FILES['thumb']) && !empty($_FILES['thumb']['name'])) {
            $file = $_FILES['thumb'];
            $fileName = md5(uniqid());
            $path = $this->folder_path . $fileName . '.'.substr(strrchr($file['name'], '.'), 1);
            $content = File::get($file['tmp_name']);
            $result = $this->manager->saveFile($path, $content);

            //2.生成文件缩略图
            if ($result === true) {
                $source_file = File::get(public_path().'/uploads'.$path);
                $img = Image::make($source_file);                     // 打开资源文件
                $img->resize(320, 240);                                                  // 重设大小
                $img->insert(public_path(). '/asset/Blog/Admin/img/demon_thumb.png','bottom-right');    // 添加水印
                //保存文件
                $img->save(public_path() .'/uploads' . $this->folder_path . $fileName . '_thumb.'.substr(strrchr($file['name'], '.'), 1));
                $data['thumb'] = $this->folder_path . $fileName . '_thumb.'.substr(strrchr($file['name'], '.'), 1);
            }
        }

        if(!isset($data['id']) || empty($data['id'])) {
            $cate = BlogArt::create($data);
            return success('添加成功');
        }else {
            $cate = BlogArt::find($data['id']);
            if(empty($data['thumb'])) {
                unset($data['thumb']);
            }
            $cate->update($data);
            return success('更新成功');
        }

    }

    /*
     * @desc 单独删除
     */
    public function anyDel($id) {
        $art = BlogArt::find($id);
        $art->delete($id);
        return success('删除成功');
    }

    /*
     * @desc 批量删除
     */
    public function anyBatchDel(Request $request) {
        $ids = $request->input('ids','');

        if(!empty($ids)) {
            $ids = explode(',',$ids);

            $data['deleted_at'] = date('Y-m-d H:i:s');
//            return $data;
            $op = BlogArt::whereIn('id',$ids)->update($data);

            return success('删除成功');
        }


        return success('请选择要删除的文章');
    }

    /*
     * @desc 获得excel数据表
     * @param1 参数暂无
     * @return 返回excel表
     */
    public function anyExport() {
        $cellData = BlogArt::get()->toArray();
        array_unshift($cellData,['序号','文章名','标题','关键字','描述','内容','浏览量','缩略图地址','排序','作者','发布时间','所属分类','创建时间','更新时间','删除时间']);
        Excel::create('博客文章',function($excel) use ($cellData){
            $excel->sheet('score', function($sheet) use ($cellData){
                $sheet->rows($cellData);
            });
        })->export('xls');
    }









}