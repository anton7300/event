<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/event-create', 'EventController@create')->name('event.create');
    Route::post('/event', 'EventController@store')->name('event.store');
    Route::get('/event/{event}/edit', 'EventController@edit')->name('event.edit');
    Route::put('/event/{event}', 'EventController@update')->name('event.update');
    Route::delete('/event/{event}', 'EventController@destroy')->name('event.destroy');
    Route::post('/event/{event}/like', 'EventLikeController@edit')->name('event.like');
    Route::post('/event/{event}/subscribe', 'EventController@subscribe')->name('event.subscribe');
    Route::post('/ticket/buy', 'TicketController@buy')->name('ticket.buy');
    Route::post('/event/{event}/ticket/create', 'TicketController@create')->name('ticket.create');

    Route::get('/my-event', 'UserController@myEvent')->name('user.my-event');
    Route::get('/my-participate', 'UserController@myParticipate')->name('user.my-participate');
    Route::get('/my-subscribers', 'UserController@subscribers')->name('user.my-subscribers');
    Route::get('/my-subscriptions', 'UserController@subscriptions')->name('user.my-subscriptions');
    Route::get('/personal', 'UserController@personal')->name('user.personal');
    Route::put('/personal/update', 'UserController@update')->name('user.update');
    Route::post('/{user}/subscribe', 'UserController@subscribe')->name('user.subscribe');

    Route::get('/dialogs', 'DialogController@index')->name('dialog.index');
    Route::get('/dialog/{dialog}', 'DialogController@show')->name('dialog.show');
    Route::post('/dialog/create/{user}', 'DialogController@create')->name('dialog.create');
    Route::post('/dialog/{dialog}/messages', 'DialogMessageController@index');
    Route::post('/dialog/{dialog}/message-create', 'DialogMessageController@create');

    Route::post('/chat/{chat}/messages', 'ChatMessageController@messages');
    Route::post('/chat/{chat}/message-create', 'ChatMessageController@create');
});