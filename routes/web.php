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
