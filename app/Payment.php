<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'ticket_user_id', 'currency_id', 'payment_system_id', 'amount', 'payment_token', 'payment_at'
    ];
}
