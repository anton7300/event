<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'date', 'location', 'logo', 'description_short', 'description', 'age_from', 'age_to', 'gender', 'count_users', 'interest_id', 'type', 'is_active', 'created_by'
    ];

    public function creator()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function subscribers()
    {
        return $this->belongsToMany('App\User', 'event_subscribers');
    }

    public function likes()
    {
        return $this->hasMany('App\EventLike');
    }

    public function chat()
    {
        return $this->hasOne(Chat::class);
    }

    public function tags ()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function region ()
    {
        return $this->belongsTo(Region::class);
    }

    public function weather ()
    {
        return $this->hasOne(Weather::class);
    }

    public function tickets ()
    {
        return $this->hasMany(Ticket::class);
    }
}
