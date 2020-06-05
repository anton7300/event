<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterestCat extends Model
{
    protected $fillable = [
        'name'
    ];

    public function interests()
    {
        return $this->hasMany(Interest::class, 'cat_id');
    }
}
