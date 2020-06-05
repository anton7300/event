<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name', 'date', 'location', 'logo', 'description_short', 'description', 'age_from', 'age_to', 'gender', 'count_users', 'interest_id', 'type', 'is_active', 'created_by'
    ];

    public function creator()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function subscribers()
    {
        return $this->belongsToMany('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\EventLike');
    }

    public function chat()
    {
        return $this->hasOne(Chat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
