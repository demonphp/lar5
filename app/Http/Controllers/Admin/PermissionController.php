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
    public function getEdit($id)
    {
        $permission = Permission::whereId($id)->first();
        if(!empty($id)) {
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
            $disabledIdsArr = [];
        }
        $permissionsTree = Permission::getNestedList('display_name','id','└'); // 获取所有节点树
//        return $permissionsTree;
        return view($this->view_path.'.edit')->with(['data'=>$permission,'tree'=>$permissionsTree,'disabledIdsArr'=>$disabledIdsArr]);
    }

    /*
     * @desc 更新或者添加分类
     */
    public function postSave(Request $request)
    {
        $rules = [
            'name'                  => 'required',
            'display_name'          => 'required',
            'description'           => 'required',
            'parent_id'             => 'required',
        ];

         $message = array(
            "required"  => ":attribute 不能为空",
            "between"   => ":attribute 长度必须在 :min 和 :max 之间"
        );

         $attributes = array(
             'name'              => '英文名',
             'display_name'      => '显示中文名',
             'description'       => '描述',
             'parent_id'         => '上级分类',
         );

        $columns = array('id','name','display_name','description','parent_id','is_menu','is_nav');
        $validator = Validator::make($request->all(), $rules, $message, $attributes);
        if ($validator->fails()) {
            return error($validator->messages()->first());
        }

        $data = array_only($request->all(),$columns);

        if(!isset($data['id']) || empty($data['id'])) {
            $res = Permission::where('name','=',$data['name'])->first();
            if(!empty($res)) {
                return error('已存在同英文名权限');
            }
            Permission::create($data);
            return success('添加成功');
        }else {
            $per = Permission::find($data['id']);
            $per->update($data);
            return success('更新成功');
        }
    }

    /*
     * @desc 单独删除
     */
    public function anyDel($id)
    {
        $art = BlogArt::find($id);
        $art->delete($id);
        return success('删除成功');
    }




}