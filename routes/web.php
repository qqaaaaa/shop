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
Route::any('/index','ShoporderController@index');

Route::any('/search_order_number','ShoporderController@search_order_number');
Route::any('/trade_status','ShoporderController@trade_status');
Route::any('/trade_status_input','ShoporderController@trade_status_input');
Route::any('/addressUpdate','ShoporderController@addressUpdate');
Route::any('/updateselect','ShoporderController@updateselect');
Route::any('/trade_user','ShoporderController@trade_user');
Route::any('/nameUpdate','ShoporderController@nameUpdate');