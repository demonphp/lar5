<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

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
        return view('admin.index');
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



}