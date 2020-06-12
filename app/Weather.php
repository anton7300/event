<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    protected $fillable = [
        'temp', 'weather', 'date'
    ];

    public function region ()
    {
        return $this->belongsTo(Region::class);
    }

    public function event ()
    {
        return $this->belongsTo(Event::class);
    }
}