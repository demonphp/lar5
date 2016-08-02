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

Route::auth();
Route::get('/home', 'HomeController@index');

// 文件上传下载管理
Route::get('admin/upload', 'Admin\UploadController@index');
Route::post('admin/upload/file', 'Admin\UploadController@uploadFile');
Route::delete('admin/upload/file', 'Admin\UploadController@deleteFile');
Route::post('admin/upload/folder', 'Admin\UploadController@createFolder');
//Route::delete('admin/upload/folder', 'Admin\UploadController@deleteFolder');

Route::controller('/blog','Home\BlogIndexController');
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');  //日志路由

Route::group(['prefix' => '/admin','middleware' => ['web']], function () {
    Route::auth();      //这个有点不太清楚怎么用
    Route::get('/login', 'Admin\AuthController@getLogin');
    Route::post('/login', 'Admin\AuthController@postLogin');
    Route::get('/register', 'Admin\AuthController@getRegister');
    Route::post('/register', 'Admin\AuthController@postRegister');
    Route::get('/', 'AdminController@index');

    Route::group(['prefix' => '/blog'], function () {
        Route::controller('/cate','Admin\BlogCateController');
        Route::controller('/art','Admin\BlogArtController');
        Route::controller('/links','Admin\BlogLinksController');
        Route::controller('/navs','Admin\BlogNavsController');
        Route::controller('/conf','Admin\BlogConfController');
    });
});
