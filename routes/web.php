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
//首页
Route::any('homePage', 'NewsController@homePage');
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

//渲染修改角色页面
Route::any('updRole','AdminController@updRole');
//修改角色信息
Route::any('doUpdRole','AdminController@doUpdRole');
//获取角色成员
Route::any('getRoleGroup','AdminController@getRoleGroup');
//删除角色成员
Route::any('delRoleAdmin','AdminController@delRoleAdmin');
//获取用户意见
Route::any('getOpinion','AdminController@getOpinion');
//渲染回复用户意见页面
Route::any('replyUser','AdminController@replyUser');
//回复用户
Route::any('doReply','AdminController@doReply');

//菜单添加页面渲染
Route::any('menuAdd', 'NewsController@menuAdd');
//菜单添加
Route::any('menuAdds', 'NewsController@menuAdds');
//菜单删除
Route::any('menuAdds', 'NewsController@menuAdds');
//查看子菜单
Route::any('menuDetails', 'NewsController@menuDetails');
//子菜单添加页面
Route::any('subMenuAdd', 'NewsController@subMenuAdd');
//子菜单添加
Route::any('subMenuAdds', 'NewsController@subMenuAdds');
//子菜单修改页面
Route::any('subMenuCompile', 'NewsController@subMenuCompile');
//子菜单删除
Route::any('subMenuDel', 'NewsController@subMenuDel');
//子菜单修改
Route::any('subMenuCompiles', 'NewsController@subMenuCompiles');
//菜单编辑页面
Route::any('menuCompile', 'NewsController@menuCompile');
//菜单编辑
Route::any('menuCompiles', 'NewsController@menuCompiles');
//菜单删除
Route::any('menuDel', 'NewsController@menuDel');
