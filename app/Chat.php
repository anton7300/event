<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = ['event_id'];

    public function event ()
    {
        return $this->belongsTo(Event::class);
    }

    public function messages ()
    {
        return $this->hasMany(ChatMessage::class);
    }
}
