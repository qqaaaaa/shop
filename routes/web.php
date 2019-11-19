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
