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
    Route::post('user', 'UserController@store');
    Route::patch('user', 'UserController@update');
    Route::delete('user', 'UserController@destroy');

    Route::get('group/:id', 'GroupController@show');
    Route::post('group', 'GroupController@store');
    Route::patch('group', 'GroupController@update');
    Route::delete('group', 'GroupController@destroy');

    Route::get('groupmember', 'GroupMemberController@index');
    Route::post('groupmember', 'GroupMemberController@store');
    Route::delete('groupmember', 'GroupMemberController@destroy');

    Route::get('makeshift', 'MakeShiftController@index');
    Route::post('makeshift', 'MakeShiftController@store');
    Route::patch('makeshift', 'MakeShiftController@update');
    Route::delete('makeshift', 'MakeShiftController@destroy');

    Route::get('wishsurvey', 'WishSurveyController@index');
    Route::get('wishsurvey/:id', 'WishSurveyController@show');
    Route::patch('wishsurvey', 'WishSurveyController@update');
    Route::post('wishsurvey', 'WishSurveyController@store');

    Route::get('operator/:id', 'OperatorController@show');

    Route::get('homesidemenu/:id', 'HomeSideMenuController@show');

    Route::get('groupsidemenu/:id', 'GroupSideMenuController@show');

    Route::get('Calendar/:id', 'CalendarController@show');

    Route::get('share/:id', 'SharController@show');

    Route::get('wishshift', 'WishShiftController@index');

    Route::get('position', 'PositionController@index');
});
