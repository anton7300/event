<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserEmail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'email'
    ];

    public function user ()
    {
        return $this->belongsTo(User::class);
    }
}