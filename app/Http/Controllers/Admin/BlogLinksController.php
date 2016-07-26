<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\BlogLinks;
use Validator;

class BlogLinksController extends Controller
{
    protected $view_path = 'admin.blog.links';

    /*
     * @param1	$request
     */
    public function anyList(Request $request)
    {
        $page = $request->input('numPerPage',20);
        $name = $request->input('name','');

        $op = new BlogLinks();
        if(!empty($name)) {
            $op  = $op->where('name','LIKE','%'.$name .'%');
        }

        $list = $op->paginate($page)->toArray();
//        return $list;
        return view($this->view_path.'.list')->with(['list'=>$list]);
    }

    /*
     * @desc 返回添加或修改的页面
     */
    public function getEdit($id) {
        $cate = BlogLinks::find($id);
        return view($this->view_path.'.edit')->with(['data'=>$cate]);
    }

    /*
     * @desc 更新或者添加分类
     */
    public function postSave(Request $request)
    {
        $rules = [
            'name'              => 'required',
            'title'             => 'required',
            'url'               => 'required',
        ];

        $message = ["required"  => ":attribute 不能为空", "between" =>":attribute 长度必须在 :min 和 :max 之间"];
        $attributes = [
            'name'              => '分类名',
            'title'             => '标题',
            'url'               => '链接地址',
        ];

        $columns = array('id','name','title','url');
        $validator = Validator::make($request->all(), $rules, $message, $attributes);
        if ($validator->fails()) {
            return error($validator->messages()->first());
        }
        $data = array_only($request->all(),$columns);

        if(!isset($data['id']) || empty($data['id'])) {
            $res = BlogLinks::where('name','=',$data['name'])->first();
            if($res) {
                return error('已经存在同名的友情链接');
            }

            $cate = BlogLinks::create($data);
            return success('添加成功');
        }else {
            $cate = BlogLinks::find($data['id']);
            $cate->update($data);
            return success('更新成功');
        }
    }

    /*
     * @desc 单独删除
     */
    public function anyDel($id) {
        $art = BlogLinks::find($id);
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
            $op = BlogLinks::whereIn('id',$ids)->delete();
            return success('删除成功');
        }

        return success('请选择要删除的文章');
    }









}