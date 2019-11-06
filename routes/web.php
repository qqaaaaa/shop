<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//渲染登录页面
Route::get('user', 'NewsController@user');
//登录验证
Route::post('loGin', 'NewsController@loGin');
//菜单列表
Route::any('menuList', 'NewsController@menuList');
Route::any('test','AdminController@index');
Route::any('doAddAdmin','AdminController@doAddAdmin');
Route::any('addAdmin','AdminController@addAdmin');
Route::any('adminList','AdminController@adminList');
Route::any('delAdmin','AdminController@delAdmin');
Route::any('updAdmin','AdminController@updAdmin');
Route::any('doUpdAdmin','AdminController@doUpdAdmin');
Route::any('addRole','AdminController@addRole');
Route::any('doAddRole','AdminController@doAddRole');
Route::any('roleList','AdminController@roleList');
Route::any('delRole','AdminController@delRole');
