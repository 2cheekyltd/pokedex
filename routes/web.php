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

Route::get('/', 'ViewController@index')->name('home');
Route::get('pokemon/{name}', 'ViewController@singular')->name('pokemon.show');
Route::get('search', 'ViewController@search')->name('search');
Route::post('search-results', 'ViewController@searchResults')->name('search.post');

Route::post('get-results', 'ViewController@getNewResults')->name('results.get');
