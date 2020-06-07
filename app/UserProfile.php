<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfile extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'age', 'gender', 'logo', 'location', 'locale'
    ];

    public function user ()
    {
        return $this->belongsTo(User::class);
    }
}