<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $fillable = ['message', 'user_id'];

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function chat ()
    {
        return $this->belongsTo(Chat::class);
    }
}
