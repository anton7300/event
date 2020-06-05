<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DialogMessage extends Model
{
    protected $fillable = ['message', 'user_id'];

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function dialog ()
    {
        return $this->belongsTo(Dialog::class);
    }
}
