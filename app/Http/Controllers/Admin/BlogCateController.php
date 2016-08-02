<?php

namespace App\Http\Controllers\Admin;


use App\Models\Common\BuildTreeArray;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\BlogCate;
use \Validator;

class BlogCateController extends Controller
{
    protected $view_path = 'admin.blog.cate';

    /*
     * @param1	$request
     */
    public function anyList(Request $request)
    {
        $page = $request->input('numPerPage',20);
        $name = $request->input('name','');

        $op = new BlogCate();
        if(!empty($name)) {
            $op   = $op->where('name','LIKE','%'.$name .'%');
        }

        $list = $op->paginate($page)->toArray();
        return view($this->view_path.'.list')->with(['list'=>$list]);
    }

    /*
     * @desc 返回添加或修改的页面
     */
    public function getEdit($id) {
        $cate = BlogCate::find($id);
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
         );

        $columns = array('id','name','title','keywords','description','view','order','cate_pid');
        $validator = Validator::make($request->all(), $rules, $message, $attributes);
        if ($validator->fails()) {
            return error($validator->messages()->first());
        }
        $data = array_only($request->all(),$columns);

        $data['pid'] = $data['cate_pid'];
        unset($data['cate_pid']);

        if(isset($data['id'])) {
            $cate = BlogCate::create($data);
            return success('添加成功');
        }else {
            $cate = BlogCate::find($data['id']);
            $cate->update($data);
            return success('更新成功');
        }
    }

    /*
     * @desc 删除分类
     */
    public function anyDelete($id) {
        $cate = BlogCate::find($id);
        $cate->delete($id);
        return success('删除成功');
    }







}