<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::auth();
Route::get('/home', 'HomeController@index');

// 文件上传下载管理
Route::get('admin/upload', 'Admin\UploadController@index');
Route::post('admin/upload/file', 'Admin\UploadController@uploadFile');
Route::delete('admin/upload/file', 'Admin\UploadController@deleteFile');
Route::post('admin/upload/folder', 'Admin\UploadController@createFolder');
//Route::delete('admin/upload/folder', 'Admin\UploadController@deleteFolder');

//Route::controller('/blog','Home\BlogIndexController');
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');  //日志路由

//Route::group(['prefix' => '/admin','middleware' => ['web']], function () {
//    Route::auth();      //这个有点不太清楚怎么用
//    Route::get('/login', 'Admin\AuthController@getLogin');
//    Route::post('/login', 'Admin\AuthController@postLogin');
//    Route::get('/register', 'Admin\AuthController@getRegister');
//    Route::post('/register', 'Admin\AuthController@postRegister');
//    Route::get('/', 'AdminController@index');
//
//    Route::group(['prefix' => '/blog'], function () {
//        Route::controller('/cate','Admin\BlogCateController');
//        Route::controller('/art','Admin\BlogArtController');
//        Route::controller('/links','Admin\BlogLinksController');
//        Route::controller('/navs','Admin\BlogNavsController');
//        Route::controller('/conf','Admin\BlogConfController');
//    });
//});

Route::get('/admin/login', 'Admin\AuthController@getLogin');
Route::post('/admin/login', 'Admin\AuthController@postLogin');
//Route::get('/admin/register', 'Admin\AuthController@getRegister');
//Route::post('/admin/register', 'Admin\AuthController@postRegister');

Route::group(['prefix'=>'admin','middleware'=>['web','role.base','role.auth'],'namespace'=>'\Admin'],function(){
//    Route::get('/', 'AdminController@index');
    Route::get('/',['as'=>'admin.index.index','uses'=>'AdminController@index']);
    Route::get('/logout',['as'=>'admin.index.logout','uses'=>'AuthController@logout']);
//    Route::get('/logout', 'AuthController@logout');       //退出登录
//    Route::auth();      //这个有点不太清楚怎么用

    //角色权限管理
    Route::group(['prefix' => '/manager'], function () {
        Route::any('/admin/list',['as'=>'admin.manager.admin.list','uses'=>'AdminController@anyList']);                 //列表
        Route::any('/admin/edit/{id}',['as'=>'admin.manager.admin.edit','uses'=>'AdminController@getEdit']);                //修改新增
        Route::any('/admin/accr-edit/{id}',['as'=>'admin.manager.admin.accr-edit','uses'=>'AdminController@getAccrEdit']);    //授权

        Route::any('/role/list',['as'=>'admin.manager.role.list','uses'=>'RoleController@anyList']);        //列表
        Route::any('/role/edit/{id}',['as'=>'admin.manager.role.edit','uses'=>'RoleController@getEdit']);   //修改新增
        Route::any('/role/save/',['as'=>'admin.manager.role.save','uses'=>'RoleController@postSave']);      //保存
        Route::any('/role/accr-edit/{id}',['as'=>'admin.manager.role.accr-edit','uses'=>'RoleController@getAccrEdit']);    //授权修改
        Route::any('/role/accr-save/',['as'=>'admin.manager.role.accr-save','uses'=>'RoleController@postAccrSave']);        //授权保存

        Route::any('/permission/list',['as'=>'admin.manager.permission.list','uses'=>'PermissionController@anyList']);        //列表
        Route::any('/permission/edit/{id}',['as'=>'admin.manager.permission.edit','uses'=>'PermissionController@getEdit']);   //修改新增
        Route::any('/permission/save',['as'=>'admin.manager.permission.save','uses'=>'PermissionController@postSave']);      //保存
//        Route::controller('/admin','AdminController');
//        Route::controller('/role','RoleController');
//        Route::controller('/permission','PermissionController');
    });
    //博客管理
    Route::group(['prefix' => '/blog'], function () {
        Route::controller('/cate','BlogCateController');
        Route::controller('/art','BlogArtController');
        Route::controller('/links','BlogLinksController');
        Route::controller('/navs','BlogNavsController');
        Route::controller('/conf','BlogConfController');
    });






});
