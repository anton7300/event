<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentCurrency extends Model
{
    protected $fillable = [
        'code', 'position'
    ];
}