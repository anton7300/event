<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $fillable = [
        'name', 'cat_id'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
