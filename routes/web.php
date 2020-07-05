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

Route::get('/', 'HomeController@index');

Route::resource('hotels','HotelController');
Route::resource('services','ServiceController');
Route::resource('tourists','TouristController');
Route::resource('options','ServiceOptionController');

Route::get('/tourists/create/{hotelId}', 'TouristController@create')->name('tourists.create');
Route::get('/tourists/promo/{turistId}', 'TouristController@promo')->name('tourists.promo');
Route::get('/tourists/checkout/{turistId}', 'TouristController@checkout')->name('tourists.checkout');
Route::get('/tourists/list/{hotelId}', 'TouristController@index')->name('tourists.index');
Route::get('/code', 'TouristController@codeInput')->name('tourists.code');
Route::post('/tourists/codecheck', 'TouristController@checkCode')->name('tourists.codeDetails');

Route::get('/prestatori/{userId}', 'ServiceController@codeInput')->name('services.used');
Route::get('/servicii/{userId}', 'ServiceOptionController@codeInput')->name('options.used');
Route::get('/tourists/applied/{serviceId}', 'TouristController@used')->name('tourists.used');
Route::get('/aplicare/{userId}', 'ServiceOptionController@apply')->name('tourists.apply');

Route::post('/setareoptiuni', 'ServiceOptionController@applied')->name('options.apply');

Route::get('/options/create/{serviceId}', 'ServiceOptionController@create')->name('options.create');
Route::get('/options/list/{serviceId}', 'ServiceOptionController@index')->name('options.index');
Route::get('/options/edit/{serviceId}', 'ServiceOptionController@edit')->name('options.edit');

Route::get('/emailconf', 'TouristController@email')->name('tourists.email');
Route::post('/emailconfig', 'TouristController@emailconf')->name('tourists.emailconf');

Auth::routes();

Route::get('/home', 'TouristController@index')->name('home');
