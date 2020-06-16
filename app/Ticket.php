<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'event_id', 'currency_id', 'title', 'count', 'price', 'discount', 'is_place', 'place_img'
    ];

    public function event ()
    {
        return $this->belongsTo(Event::class);
    }
}
