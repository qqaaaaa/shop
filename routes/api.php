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
    Route::post('classify', 'ApiController@classify');
    Route::post('product', 'ApiController@product');

    Route::any('logout', 'ApiController@logout');

    Route::any('refresh', 'ApiController@refresh');

    Route::post('me', 'ApiController@me');

	});