<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketUser extends Model
{
    protected $fillable = [
        'ticket_id', 'user_id', 'currency_id', 'place', 'amount', 'payment_token', 'is_payment', 'code', 'reserved_at'
    ];

    protected $table = 'ticket_user';
}
