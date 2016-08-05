<?php

namespace App\Http\Controllers\Admin;


use App\Role;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\BlogArt;
use Validator,Excel;

class RoleController extends Controller
{
    protected $view_path = 'admin.manager.role';

    /*
     * @param1	$request
     */
    public function anyList(Request $request)
    {
        $page = $request->input('numPerPage',20);
        $name = $request->input('name','');

        $op = new Role();
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
        $role = Role::find($id);
        return view($this->view_path.'.edit')->with(['data'=>$role]);
    }

    /*
     * @desc 更新或者添加
     */
    public function postSave(Request $request)
    {
        $rules = [
            'name'            => 'required',
            'display_name'    => 'required',
            'description'     => 'required',
        ];

         $message = array(
            "required"  => ":attribute 不能为空",
            "between"   => ":attribute 长度必须在 :min 和 :max 之间"
        );

         $attributes = array(
             'name'                 => '角色英文名',
             'display_name'         => '角色中文名',
             'description'          => '描述',
         );

        $columns = array('id','name','display_name','description');
        $validator = Validator::make($request->all(), $rules, $message, $attributes);
        if ($validator->fails()) {
            return error($validator->messages()->first());
        }
        $data = array_only($request->all(),$columns);

        $first = Role::where('name','=',$data['name'])->orWhere('display_name','=',$data['display_name'])->first();
        if(!empty($first) && isset($data['id']) && $first['id'] != $data['id']) {
            if($data['name'] == $first['name']) {
                return error('已存在同英文名角色');
            } else {
                return error('已存在同中文名角色');
            }
        }

        if(!isset($data['id']) || empty($data['id'])) {
            $data['created_at'] = date('Y-m-d H:i:s');
            $role = Role::insert($data);
            return success('添加成功');
        }else {
            Role::where('id',$data['id'])->update($data);
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




}