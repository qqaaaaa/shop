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
<<<<<<< HEAD

Route::any('property','IndexController@property');
Route::any('propertyAdd','IndexController@propertyAdd');
Route::any('propertyAddok','IndexController@propertyAddok');
Route::any('classifyAdd','IndexController@classifyAdd');
Route::any('classifyAddok','IndexController@classifyAddok');
Route::any('classifyShow','IndexController@classifyShow');
Route::any('propertyUpd','IndexController@propertyUpd');
Route::any('propertyUpdok','IndexController@propertyUpdok');
Route::any('classifyUpd','IndexController@classifyUpd');
Route::any('classifyUpdok','IndexController@classifyUpdok');
Route::any('classifyDel','IndexController@classifyDel');
Route::any('propertyDel','IndexController@propertyDel');

Route::any('/index','ShoporderController@index');
Route::any('/search_order_number','ShoporderController@search_order_number');
Route::any('/trade_status','ShoporderController@trade_status');
Route::any('/trade_status_input','ShoporderController@trade_status_input');
Route::any('/addressUpdate','ShoporderController@addressUpdate');
Route::any('/updateselect','ShoporderController@updateselect');
Route::any('/trade_user','ShoporderController@trade_user');
Route::any('/nameUpdate','ShoporderController@nameUpdate');
=======
Route::any('updRole','AdminController@updRole');
Route::any('doUpdRole','AdminController@doUpdRole');
Route::any('getRoleGroup','AdminController@getRoleGroup');
Route::any('delRoleAdmin','AdminController@delRoleAdmin');
Route::any('getOpinion','AdminController@getOpinion');
Route::any('replyUser','AdminController@replyUser');
Route::any('doReply','AdminController@doReply');
>>>>>>> fanxuxin
