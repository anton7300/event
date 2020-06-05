<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dialog extends Model
{
    public function users ()
    {
        return $this->belongsToMany(User::class);
    }

    public function messages ()
    {
        return $this->hasMany(DialogMessage::class);
    }
}
