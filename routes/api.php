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

Route::post('user', 'UserController@store');
Route::patch('user', 'UserController@update');
Route::delete('user', 'UserController@destroy');

Route::get('group', 'GroupController@show');
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
Route::get('wishsurvey', 'WishSurveyController@show');
Route::patch('wishsurvey', 'WishSurveyController@update');

Route::get('operator', 'OperatorController@show');

Route::get('homesidemenu', 'HomeSideMenuController@show');

Route::get('groupsidemenu', 'GroupSideMenuController@show');

Route::get('Calendar', 'CalendarController@show');

Route::get('share', 'SharController@show');

Route::get('wishshift', 'WishShiftController@index');

Route::get('position', 'PositionController@index');
?>