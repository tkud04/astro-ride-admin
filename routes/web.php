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

#Route::get('/', function(){return "<h2 style='color: red;'>Out of service</h2>";});

Route::get('/', 'MainController@getIndex');

Route::get('login', 'LoginController@getLogin');
Route::post('login', 'LoginController@postLogin');

Route::get('payment/callback', 'PaymentController@getPaymentCallback');

Route::get('accounts', 'MainController@getAccounts');
Route::post('accounts', 'MainController@postAccounts');
Route::get('config', 'MainController@getAddConfig');
Route::post('config', 'MainController@postAddConfig');
Route::get('ca', function(){return redirect()->intended('accounts');});
Route::post('ca', 'MainController@postViewAccount');
Route::get('cca', function(){return redirect()->intended('config');});
Route::post('cca', 'MainController@postViewConfig');
Route::get('logout', 'LoginController@getLogout');


Route::get('practice', 'MainController@getPractice');
Route::get('zohoverify/{url}', 'MainController@getZoho');


