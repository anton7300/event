<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';

    protected $fillable = [
        'title', 'iso'
    ];

    public function regions ()
    {
        return $this->hasMany(Region::class);
    }
}