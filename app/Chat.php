<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    use SoftDeletes;

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
