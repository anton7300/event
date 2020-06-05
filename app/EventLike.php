<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventLike extends Model
{
    protected $fillable = [
        'event_id', 'user_id'
    ];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
