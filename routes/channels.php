<?php

use Illuminate\Support\Facades\Broadcast;
use App\Dialog;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

//Broadcast::channel('App.User.{id}', function ($user, $id) {
//    return (int) $user->id === (int) $id;
//});

Broadcast::channel('dialog.{dialogId}', function ($user, $dialogId) {
    return Dialog::find($dialogId)->users()->where('users.id', $user->id)->first();
});

Broadcast::channel('chat.{chatId}', function ($user) {
    return $user;
});