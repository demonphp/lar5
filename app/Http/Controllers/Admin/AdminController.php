<?php

namespace App\Http\Controllers\Admin;


use App\Admin;
use App\Models\Permission;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth,Validator;

class AdminController extends Controller
{
    protected $view_path = 'admin.manager.admin';

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {


        $admin = Auth::guard('admin')->user();

        //获取目录树
        $root_data = Permission::where('parent_id','=',0)->get();

        $menuList = [];
        foreach($root_data as $v) {
            $menuList[] = Permission::where('id', '=',$v['id'])->first()->getDescendantsAndSelf()->toHierarchy()[$v['id']];
        }


//return $menuList;
        //$tree = Permission::where('name', '=', 'admin.user')->first()->getDescendantsAndSelf()->toHierarchy();
//        dd($admin);
        return view('admin.index',compact('menuList'));
    }

    /*
     * @param1	$request
     */
    public function anyList(Request $request)
    {
        $page = $request->input('numPerPage',20);
        $name = $request->input('name','');

        $op = new Admin();
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
        $data = Admin::find($id);
        return view($this->view_path.'.edit',compact('data'));
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

        $columns = array('id','name','display_name','description','parent_id');
        $validator = Validator::make($request->all(), $rules, $message, $attributes);
        if ($validator->fails()) {
            return error($validator->messages()->first());
        }

        $data = array_only($request->all(),$columns);

        if(!isset($data['id']) || empty($data['id'])) {
            Permission::create($data);
            return success('添加成功');
        }else {
            $per = Permission::find($data['id']);
            if(empty($data['thumb'])) {
                unset($data['thumb']);
            }
            $per->update($data);
            return success('更新成功');
        }
    }

    /*
   * @desc 返回授权页面
   */
    public function getAccrEdit($id) {
        $data = Admin::find($id);
        $this_roles = $data->roles()->lists('id')->toArray();

        $role = Role::get();
        return view($this->view_path.'.accredit',compact('data','role','this_roles'));
    }

    /*
     * @desc 更新授权页面
     */
    public function postAccrSave(Request $request)
    {
        $rules = [
            'user_id'          => 'required',
            'role_id'          => 'required',
        ];

        $message = array(
            "required"  => ":attribute 不能为空",
            "between"   => ":attribute 长度必须在 :min 和 :max 之间"
        );

        $attributes = array(
            'user_id'          => '授权用户不能为空',
            'role_id'          => '授权角色',
        );

        $columns = array('user_id','role_id');
        $validator = Validator::make($request->all(), $rules, $message, $attributes);
        if ($validator->fails()) {
            return error($validator->messages()->first());
        }

        $data = array_only($request->all(),$columns);

        $user = Admin::find($data['user_id']);
        $user->roles()->sync( $data['role_id'] ); // 使用多对多关联模型将数据同步到 role_user中间表
        return success('授权用户成功');
    }



}