<?php

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/login', 'OauthController@login')->name('login');

Route::group(['namespace' => '\App\Services\Api'], function () {
    Route::get('main', 'Main@index')->name('main');
    Route::get('help', 'Help@index')->name('help');

    Route::get('event', 'EventApi@index')->name('event.index');
    Route::get('event/{event}', 'EventApi@show')->name('event.show');

    Route::get('user', 'UserApi@index')->name('user.index');
    Route::get('user/{user}', 'UserApi@show')->name('user.show');

    Route::get('locale/{locale}', 'LocalizationApi@index')->name('locale.set');

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('event-create', 'EventApi@create')->name('event.create');
//        Route::post('/event', 'EventController@store')->name('event.store');
//        Route::get('/event/{event}/edit', 'EventController@edit')->name('event.edit');
//        Route::put('/event/{event}', 'EventController@update')->name('event.update');
//        Route::delete('/event/{event}', 'EventController@destroy')->name('event.destroy');
//        Route::post('/event/{event}/like', 'EventLikeController@edit')->name('event.like');
//        Route::post('/event/{event}/subscribe', 'EventController@subscribe')->name('event.subscribe');
//
//        Route::get('/my-event', 'UserController@myEvent')->name('user.my-event');
//        Route::get('/my-participate', 'UserController@myParticipate')->name('user.my-participate');
//        Route::get('/my-subscribers', 'UserController@subscribers')->name('user.my-subscribers');
//        Route::get('/my-subscriptions', 'UserController@subscriptions')->name('user.my-subscriptions');
//        Route::get('/personal', 'UserController@personal')->name('user.personal');
//        Route::put('/personal/update', 'UserController@update')->name('user.update');
//        Route::post('/{user}/subscribe', 'UserController@subscribe')->name('user.subscribe');
//
//        Route::get('/dialogs', 'DialogController@index')->name('dialog.index');
//        Route::get('/dialog/{dialog}', 'DialogController@show')->name('dialog.show');
//        Route::post('/dialog/create/{user}', 'DialogController@create')->name('dialog.create');
//        Route::post('/dialog/{dialog}/messages', 'DialogMessageController@index');
//        Route::post('/dialog/{dialog}/message-create', 'DialogMessageController@create');
//
//        Route::post('/chat/{chat}/messages', 'ChatMessageController@messages');
//        Route::post('/chat/{chat}/message-create', 'ChatMessageController@create');
    });
});