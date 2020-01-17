<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// 公共模块
Route::group([],function (){
    // 文件上传
    Route::post('upload','CommonController@upload');
    // 获取权限路由列表
    Route::get('routes', 'CommonController@routes');
});

// 用户登录相关操作
Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout');
Route::get('refresh', 'AuthController@refresh');
