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
//添加管理员
Route::any('doAddAdmin','AdminController@doAddAdmin');
//渲染页面
Route::any('addAdmin','AdminController@addAdmin');
//管理员列表
Route::any('adminList','AdminController@adminList');
//删除管理员
Route::any('delAdmin','AdminController@delAdmin');
//渲染修改管理员页面
Route::any('updAdmin','AdminController@updAdmin');
//修改管理员
Route::any('doUpdAdmin','AdminController@doUpdAdmin');
//渲染管理员页面
Route::any('addRole','AdminController@addRole');
//添加管理员
Route::any('doAddRole','AdminController@doAddRole');
//角色列表
Route::any('roleList','AdminController@roleList');
//删除角色
Route::any('delRole','AdminController@delRole');

//商品列表
Route::any('property','IndexController@property');
//商品添加
Route::any('propertyAdd','IndexController@propertyAdd');
Route::any('propertyAddok','IndexController@propertyAddok');
//分类添加
Route::any('classifyAdd','IndexController@classifyAdd');
Route::any('classifyAddok','IndexController@classifyAddok');
//分类展示
Route::any('classifyShow','IndexController@classifyShow');
//商品修改
Route::any('propertyUpd','IndexController@propertyUpd');
Route::any('propertyUpdok','IndexController@propertyUpdok');
//分类修改
Route::any('classifyUpd','IndexController@classifyUpd');
Route::any('classifyUpdok','IndexController@classifyUpdok');
//分类删除
Route::any('classifyDel','IndexController@classifyDel');
//商品删除
Route::any('propertyDel','IndexController@propertyDel');

Route::any('/index','ShoporderController@index');
Route::any('/search_order_number','ShoporderController@search_order_number');
Route::any('/trade_status','ShoporderController@trade_status');
Route::any('/trade_status_input','ShoporderController@trade_status_input');
Route::any('/addressUpdate','ShoporderController@addressUpdate');
Route::any('/updateselect','ShoporderController@updateselect');
Route::any('/trade_user','ShoporderController@trade_user');
Route::any('/nameUpdate','ShoporderController@nameUpdate');
Route::any('updRole','AdminController@updRole');
Route::any('doUpdRole','AdminController@doUpdRole');
Route::any('getRoleGroup','AdminController@getRoleGroup');
Route::any('delRoleAdmin','AdminController@delRoleAdmin');
Route::any('getOpinion','AdminController@getOpinion');
Route::any('replyUser','AdminController@replyUser');
Route::any('doReply','AdminController@doReply');
