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

Route::get('/', 'BukuTamuController@show')->name('bukutamu.show');
Route::post('/bukutamu/store', 'BukuTamuController@store')->name('bukutamu.store');
Route::post('/bukutamu/destroy/{id}', 'BukuTamuController@destroy')->name('bukutamu.destroy');
