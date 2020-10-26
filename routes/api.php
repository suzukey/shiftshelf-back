<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'v1', 'namespace' => 'V1'], function () {
    Route::get('/message/create', 'UserController@create');
    Route::put('/message/{id}','UserController@update');
    Route::delete('/message/{id}','UserController@destroy');

    Route::post('message','GroupController@store');
    Route::get('/message/create', 'GroupController@create');
    Route::put('/message/{id}','GroupController@update');
    Route::delete('/message/{id}','GroupController@destroy');
});
