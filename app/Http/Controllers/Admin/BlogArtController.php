<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\File;

use App\Models\Common\BuildTreeArray;
use App\Services\UploadsManager;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\BlogArt;
use Validator,Image;

class BlogArtController extends Controller
{
    protected $view_path = 'admin.blog.art';
    protected $folder_path = '/admin/blog/art/img/';
    protected $manager;

    public function __construct(UploadsManager $manager)
    {
        $this->manager = $manager;
    }

    /*
     * @param1	$request
     */
    public function anyList(Request $request)
    {
        $page = $request->input('numPerPage',20);
        $name = $request->input('name','');

        $op = new BlogArt();
        $op = $op->where('deleted_at','=','0000-00-00 00:00:00');
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
        $cate = BlogArt::find($id);
        return view($this->view_path.'.edit')->with(['data'=>$cate]);
    }

    /*
     * @desc 树查找带回
     */
    public function anyTreeLookup() {
        $cate = BlogCate::get();
        $bta = new BuildTreeArray($cate,'id','pid',0);
        $list = $bta->getTreeArray();
        $list = json_encode($list);
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

    public function getTest() {

        return public_path();
        $file = file_get_contents('D:/web/lar5_2/public/logo.jpg');

        $img = Image::make($file);
//        return $img;
//// resize image instance
//        $img->resize(320, 240);

// insert a watermark
        $img->insert('D:/web/lar5_2/public/demon_thumb.png');

// save image in desired format
        $img->save('/bar.jpg');

        return 'ok';
    }







}