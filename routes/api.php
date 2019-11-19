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
Route::post('addOrder','CarController@addOrder');

Route::get('classify','ClassifyController@index');
Route::get('collect','ClassifyController@collect');


Route::group([

    'middleware' => 'api',

    'prefix' => 'auth'

], function ($router) {

	Route::any('loGin', 'ApiController@loGin');
	Route::any('reSetPwd', 'ApiController@reSetPwd');
	Route::any('reSetPwds', 'ApiController@reSetPwds');
	 Route::post('login', 'ApiController@login');
	  Route::post('mailBox', 'ApiController@mailBox');
    Route::post('register', 'ApiController@register');
    Route::post('classify', 'ApiController@classify');

    Route::post('logout', 'ApiController@logout');

    Route::post('refresh', 'ApiController@refresh');

    Route::post('me', 'ApiController@me');

	});


Route::any('login', 'AuthControllera@login');
Route::any('logout', 'AuthControllera@logout');
Route::any('refresh', 'AuthControllera@refresh');
Route::any('me', 'AuthControllera@me');

