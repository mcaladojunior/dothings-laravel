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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('things', 'ThingController');
Route::post('things/storeFromList', 'ThingController@storeFromList')->name('things.storeFromList');

Route::resource('lists', 'ListController');

Route::resource('reminders', 'ReminderController');
