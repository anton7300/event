<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentSystem extends Model
{
    protected $fillable = [
        'code', 'is_active', 'position'
    ];
}
