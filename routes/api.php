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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('getCar','CarController@getCar');
Route::get('delCar','CarController@delCar');
Route::get('addOrder','CarController@addOrder');
Route::get('getAddress','CarController@getAddress');

Route::get('classify','ClassifyController@index');
Route::get('classifyGoods','ClassifyController@classifyGoods');
Route::get('images','ClassifyController@images');
Route::get('ability','ClassifyController@ability');
Route::get('clas','ClassifyController@clas');
Route::get('collect','ClassifyController@collect');
Route::get('details','ClassifyController@details');


Route::group([

    'middleware' => 'api',

    'prefix' => 'auth'

], function ($router) {

	Route::any('loGin', 'ApiController@loGin');
	Route::any('reSetPwd', 'ApiController@reSetPwd');
	Route::any('reSetPwds', 'ApiController@reSetPwds');
	 Route::post('login', 'ApiController@login');
	  Route::post('mailBox', 'ApiController@mailBox');
    Route::any('register', 'ApiController@register');
    Route::get('classify', 'ApiController@classify');
    Route::post('product', 'ApiController@product');

    Route::any('logout', 'ApiController@logout');

    Route::any('refresh', 'ApiController@refresh');

    Route::post('me', 'ApiController@me');

	});


Route::any('login', 'AuthControllera@login');
Route::any('logout', 'AuthControllera@logout');
Route::any('refresh', 'AuthControllera@refresh');
Route::any('me', 'AuthControllera@me');

