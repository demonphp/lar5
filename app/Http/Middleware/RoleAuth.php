<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

class RoleAuth
{
    protected $auth;

    /**
     * Creates a new instance of the middleware.
     *
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        $currRouteName = Route::currentRouteName(); // 当前路由别名
////        dd($currRouteName);
//        dd(Auth::guard('admin')->user()->can('admin.system'));
//        $res = Auth::guard('admin')->user()->hasRole('admin');
//        dd($res);
        if(!IS_ROOT){ // 超管不受限制
            $currRouteName = Route::currentRouteName(); // 当前路由别名
            $previousUrl = URL::previous(); // 用户访问的上一页

            if(!Auth::guard('admin')->user()->can($currRouteName)){ // 如果是游客或者没有权限跳转到首页
                if($request->ajax() && ($request->getMethod() != 'GET')) {
                    return response()->json([
                        'status' => -1,
                        'code' => 403,
                        'msg' => '您没有权限执行此操作'
                    ]);
                } else {
                    return response()->json([
                        'status' => -1,
                        'code' => 403,
                        'msg' => '您没有权限执行此操作'
                    ]);
                    //return response()->view('admin.errors.403', compact('previousUrl'));
                }
            }
        }

        return $next($request);
    }
}
