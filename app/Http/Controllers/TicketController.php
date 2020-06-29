<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\User;
use App\TicketUser;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function get ()
    {

    }

    public function buy (Request $request)
    {
        $request->validate([
            'ticket_id' => ['required', 'integer'],
            'currency_id' => ['required', 'integer'],
            'place' => ['nullable', 'integer'],
            'amount' => ['nullable', 'integer', 'between:1,120'],
            'payment_token' => ['nullable', 'integer', 'between:1,120', 'gte:age_from'],
            'is_payment' => ['nullable', 'integer', 'between:1,2'],
            'code' => ['nullable', 'array']
        ]);

        TicketUser::create([
            'ticket_id' => $request->ticket_id,
            'user_id' => auth()->user()->id,
            'currency_id' => $request->currency_id,
            'place' => $request->place,
            'amount' => $request->amount,
            'payment_token' => $request->payment_token,
            'is_payment' => $request->is_payment,
            'code' => $request->code,
            'reserved_at' => date('Y-m-d H:i:s')
        ]);
    }
}
