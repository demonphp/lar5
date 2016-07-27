<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\BlogNavs;
use Validator;

class BlogNavsController extends Controller
{
    protected $view_path = 'admin.blog.navs';


    /*
     * @param1	$request
     */
    public function anyList(Request $request)
    {
        $page = $request->input('numPerPage',20);
        $name = $request->input('name','');

        $op = new BlogNavs();
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
        $cate = BlogNavs::find($id);
        return view($this->view_path.'.edit')->with(['data'=>$cate]);
    }


    /*
     * @desc 更新或者添加分类
     */
    public function postSave(Request $request)
    {
        $rules = [
            'name'              => 'required',
            'alias'              => 'required',
             'url'              => 'required',
        ];

        $message = [
            "required"  => ":attribute 不能为空",
            "between"   => ":attribute 长度必须在 :min 和 :max 之间"
        ];

        $attributes = [
            'name'              => '导航名称',
            'alias'             => '导航别名',
            'url'               => '导航链接'
        ];

        $columns = array('id','name','alias','url');
        $validator = Validator::make($request->all(), $rules, $message, $attributes);
        if ($validator->fails()) {
            return error($validator->messages()->first());
        }
        $data = array_only($request->all(),$columns);

        if(!isset($data['id']) || empty($data['id'])) {
            $res = BlogNavs::where('name','=',$data['name'])->first();
            if($res) {
                return error('已经存在同名的导航');
            }

            $cate = BlogNavs::create($data);
            return success('添加成功');
        }else {
            $cate = BlogNavs::find($data['id']);
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
        $navs = BlogNavs::find($id);
        $navs->delete($id);
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
            $op = BlogNavs::whereIn('id',$ids)->delete();
            return success('删除成功');
        }
        return success('请选择要删除的文章');
    }









}