<?php

namespace App\Http\Controllers;

use App\Dialog;
use Illuminate\Http\Request;
use App\Events\DialogMessageEvent;

class DialogMessageController extends Controller
{
    public function index (Dialog $dialog)
    {
        return $dialog->messages()->with('user')->get();
    }

    public function create(Dialog $dialog, Request $request)
    {
        $user = auth()->user();

        $dialog->messages()->create([
            'message' => $request->message,
            'user_id' => $user->id
        ]);

        broadcast(new DialogMessageEvent($dialog))->toOthers();

        return ['status' => 'ok'];
    }
}
