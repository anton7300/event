<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Event;

class TagController extends Controller
{
    public function set (Event $event, array $tags)
    {
        $tagsId = [];

        foreach ($tags as $item) {
            $tag = Tag::firstOrCreate(
                ['name' => $item]
            );

            $tagsId[] = $tag['id'];
        }

        $event->tags()->detach();

        $event->tags()->attach($tagsId);

        return true;
    }
}
