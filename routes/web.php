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

Route::get('/things', 'ThingController@index')->name('things.index');
Route::get('/things/create', 'ThingController@create')->name('things.create');
Route::post('/things/store', 'ThingController@store')->name('things.store');
Route::get('/things/show/{id}', 'ThingController@show')->name('things.show');
Route::get('/things/edit/{id}', 'ThingController@edit')->name('things.edit');
Route::put('/things/update', 'ThingController@update')->name('things.update');
Route::delete('/things/delete', 'ThingController@delete')->name('things.delete');
