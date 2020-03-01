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

/*******************************************
         MOBILE APP ROUTES
*******************************************/
Route::get('/', 'MobileAppController@getIndex');
Route::get('login', 'MobileAppController@getLogin');
Route::get('signup', 'MobileAppController@getSignup');
Route::get('logout', 'MobileAppController@getLogout');
Route::post('sync', 'MobileAppController@postAppSync');
Route::get('check-number', 'MobileAppController@getCheckNumber');
Route::get('decode-points', 'MobileAppController@getDecodePoints');