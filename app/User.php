<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nickname', 'name', 'email', 'password', 'phone', 'age', 'gender', 'logo', 'location'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function events()
    {
        return $this->hasMany(Event::class, 'created_by');
    }

    public function subscribers()
    {
        return $this->belongsToMany('App\User', 'user_subscribers', 'user_id', 'user_subscriber_id');
    }

    public function subscriptions()
    {
        return $this->belongsToMany('App\User', 'user_subscribers', 'user_subscriber_id', 'user_id');
    }

    public function interests()
    {
        return $this->belongsToMany('App\Interest');
    }

    public function dialogs ()
    {
        return $this->belongsToMany(Dialog::class);
    }

    public function dialogMessages ()
    {
        return $this->hasMany(DialogMessage::class);
    }
}
