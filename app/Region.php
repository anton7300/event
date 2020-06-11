<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'title'
    ];

    public function event ()
    {
        return $this->belongsTo(Event::class);
    }

    public function country ()
    {
        return $this->belongsTo(Country::class);
    }

    public function weather ()
    {
        return $this->hasMany(Weather::class);
    }
}
