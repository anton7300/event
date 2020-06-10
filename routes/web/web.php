<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'IndexController@index')->name('index');
Route::get('/help', 'HelpController@index')->name('help');

Route::get('/event', 'EventController@index')->name('event.index');
Route::get('/event/{event}', 'EventController@show')->name('event.show');

Route::get('/user', 'UserController@index')->name('user.index');
Route::get('/user/{user}', 'UserController@show')->name('user.show');

Route::get('/locale/{locale}', 'LocalizationController@index')->name('locale.set');


Route::get('/weather', 'WeatherController@index');