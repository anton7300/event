<?php

namespace App\Http\Controllers;

use App\Chat;
use Illuminate\Http\Request;
use App\Events\ChatMessageEvent;

class ChatMessageController extends Controller
{
    public function index (Chat $chat)
    {
        return $chat->messages()->with('user')->get();
    }

    public function create (Chat $chat, Request $request)
    {
        $user = auth()->user();

        $chat->messages()->create([
            'message' => $request->message,
            'user_id' => $user->id
        ]);

        broadcast(new ChatMessageEvent($chat))->toOthers();

        return ['status' => 'ok'];
    }
}