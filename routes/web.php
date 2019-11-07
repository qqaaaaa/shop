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
