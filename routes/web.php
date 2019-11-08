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
Route::any('/index','ShoporderController@index');//订单主页

Route::any('/search_order_number','ShoporderController@search_order_number');//搜索订单
Route::any('/trade_status','ShoporderController@trade_status');//订单详情页
Route::any('/trade_status_input','ShoporderController@trade_status_input');//订单状态修改
Route::any('/addressUpdate','ShoporderController@addressUpdate');//地址状态修改
Route::any('/updateselect','ShoporderController@updateselect');//修改记录
//Route::any('/trade_user','ShoporderController@trade_user');//
Route::any('/nameUpdate','ShoporderController@nameUpdate');//预定收货位置修改
Route::any('/brandShow','ShoporderController@brandShow');
//品牌列表
Route::any('/brandDel','ShoporderController@brandDel');//删除品牌
Route::any('/brandAdd','ShoporderController@brandAdd');//添加品牌页面
Route::any('/brandAdd_do','ShoporderController@brandAdd_do');//添加品牌方法
Route::any('/discountUpdate','ShoporderController@discountUpdate');//优惠券修改