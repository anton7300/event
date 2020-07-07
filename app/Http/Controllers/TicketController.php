<?php

namespace App\Http\Controllers;

use App\Event;
use App\Ticket;
use App\TicketUser;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * @param Ticket $ticket
     * @return array
     */
    public function getFreePlaces (Ticket $ticket)
    {
        if ($ticket->count) {
            $placesPurchased = TicketUser::whereTicketId($ticket->id)->get()->pluck('place')->toArray();

            for ($i = 1; $i<=$ticket->count; $i++) {
                if (!in_array($i, $placesPurchased)) {
                    $places[] = $i;
                }
            }
        } else {
            $placeLastPurchased = TicketUser::whereTicketId($ticket->id)->orderByDesc('id')->first();

            if (empty($placeLastPurchased))
                $places[] = 1;
            else
                $places[] = $placeLastPurchased->place + 1;
        }

        return $places;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function buy (Request $request)
    {
        $request->validate([
            'ticket' => ['required', 'integer'],
            'currency' => ['required', 'integer'],
            'section' => ['nullable', 'integer'],
            'place' => ['nullable', 'integer'],
            'amount' => ['nullable', 'integer', 'between:1,120'],
            'is_payment' => ['nullable', 'integer', 'between:1,2']
        ]);

        $ticket = Ticket::find($request->ticket)->first('price');

        TicketUser::firstOrCreate(
            [
                'ticket_id' => $request->ticket,
                'user_id' => auth()->user()->id,
                'place' => $request->place
            ],
            [
                'currency_id' => $request->currency,
                'amount' => $ticket->price,
                'is_payment' => 0,
                'reserved_at' => date('Y-m-d H:i:s')
            ]
        );

        return back();
    }

    public function create (Event $event, Request $request)
    {
        $request->validate([
            'title' => ['nullable', 'string'],
            'count' => ['nullable', 'integer'],
            'price' => ['nullable', 'integer'],
            'discount' => ['nullable', 'integer'],
            'is_place' => ['nullable', 'integer']
        ]);

        $data = $request->all();

        $ticket = Ticket::firstOrCreate(
            [
                'title' => $data['title'],
                'event_id' => $event->id
            ],
            [
                'currency_id' => $data['currency'],
                'count' => $data['count'],
                'price' => $data['price'],
                'discount' => $data['discount'],
                'is_place' => $data['is_place'],
                'place_img' => NULL
            ]
        );

        return $ticket;
    }
}
