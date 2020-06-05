<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventLike;
use Illuminate\Support\Facades\Redis;

class EventLikeController extends Controller
{
    public function edit (Event $event)
    {
        $like = EventLike::where('user_id', auth()->user()->id)->where('event_id', $event->id)->first();

        if ($like) {
            $this->delete($like);
        } else {
            $this->create($event);
        }

        Redis::set('like', $event->likes()->count());
        return back();
    }

    private function delete (EventLike $like)
    {
        $like->delete();
    }

    private function create (Event $event)
    {
        EventLike::create([
            'user_id' => auth()->user()->id,
            'event_id' => $event->id
        ]);
    }
}
