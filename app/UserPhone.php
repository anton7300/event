<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPhone extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'phone'
    ];

    public function user ()
    {
        return $this->belongsTo(User::class);
    }
}