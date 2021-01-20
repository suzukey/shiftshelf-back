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
// テスト
    Route::get('/', 'TestController@index');
// ユーザー
    Route::post('user', 'UserController@store');
    Route::patch('user/{id}', 'UserController@update');
    Route::delete('user/{id}', 'UserController@destroy');
// グループ
    Route::get('group/{id}', 'GroupController@show');
    Route::post('group', 'GroupController@store');
    Route::patch('group/{id}', 'GroupController@update');
    Route::delete('group', 'GroupController@destroy');
// グループメンバー
    Route::get('groupmember', 'GroupMemberController@index');
    Route::post('groupmember', 'GroupMemberController@store');
    Route::delete('groupmember/{id}', 'GroupMemberController@destroy');
// シフト作成
    Route::get('makeshift', 'MakeShiftController@index');
    Route::post('makeshift', 'MakeShiftController@store');
    Route::patch('makeshift/{id}', 'MakeShiftController@update');
    Route::delete('makeshift', 'MakeShiftController@destroy');
// シフト希望
    Route::get('wishshift', 'WishShiftController@index');
// 希望調査
    Route::get('wishsurvey', 'WishSurveyController@index');
    Route::get('wishsurvey/{id}', 'WishSurveyController@show');
    Route::patch('wishsurvey', 'WishSurveyController@update');
    Route::post('wishsurvey', 'WishSurveyController@store');
// ホームカレンダー
    Route::get('Calendar/{id}', 'CalendarController@show');
// 共有シフト
    Route::get('share/{id}', 'SharController@show');
// ホームサイドメニュー
    Route::get('homesidemenu/{id}', 'HomeSideMenuController@show');
// グループサイドメニュー
    Route::get('groupsidemenu', 'GroupSideMenuController@show');
// 権限
    Route::get('authority', 'AuthorityController@index');
    Route::get('authority/{id}', 'AuthorityController@show');
    Route::patch('authority/{id}', 'AuthorityController@update');
    Route::post('authority', 'AuthorityController@store');
    Route::delete('authority/{id}', 'AuthorityController@destroy');
// オペレーター権限
    Route::get('operator', 'OperatorController@index');
// シフト希望
    Route::get('wish', 'WishController@index');
    Route::post('wish', 'WishController@store');
    Route::patch('wish/{id}', 'WishController@update');
});
