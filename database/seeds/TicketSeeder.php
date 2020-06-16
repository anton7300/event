<?php

use Illuminate\Database\Seeder;
use App\Ticket;
use App\TicketUser;
use App\Event;
use App\User;
use App\PaymentCurrency;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::query()->delete();

        $tickets = [
            [
                'event_id' => 'Event 1',
                'currency_id' => 'USD',
                'title' => 'Base',
                'count' => 30,
                'price' => 20,
                'discount' => 5,
                'is_place' => 0,
                'place_img' => NULL
            ],
            [
                'event_id' => 'Event 1',
                'currency_id' => 'USD',
                'title' => 'Vip',
                'count' => 10,
                'price' => 50,
                'discount' => 5,
                'is_place' => 1,
                'place_img' => NULL
            ]
        ];

        $ticketUsers = [
            [
                'event' => 'Event 1',
                'ticket_id' => 'Base',
                'user_id' => 'admin',
                'currency_id' => 'USD',
                'place' => 1,
                'amount' => 15,
                'payment_token' => NULL,
                'is_payment' => 1,
                'code' => NULL,
                'reserved_at' => NULL
            ],
            [
                'event' => 'Event 1',
                'ticket_id' => 'Vip',
                'user_id' => 'user',
                'currency_id' => 'USD',
                'place' => 1,
                'amount' => 45,
                'payment_token' => NULL,
                'is_payment' => 1,
                'code' => NULL,
                'reserved_at' => NULL
            ]
        ];

        foreach ($tickets as $item) {
            $event = Event::whereName($item['event_id'])->first('id');
            $paymentCurrency = PaymentCurrency::whereCode($item['currency_id'])->first('id');

            $item['event_id'] = $event['id'];
            $item['currency_id'] = $paymentCurrency['id'];

            Ticket::create($item);
        }

        foreach ($ticketUsers as $item) {
            $event = Event::whereName($item['event'])->first();
            $ticket = $event->tickets()->whereTitle($item['ticket_id'])->first('id');
            $user = User::whereNickname($item['user_id'])->first('id');
            $paymentCurrency = PaymentCurrency::whereCode($item['currency_id'])->first('id');

            $item['ticket_id'] = $ticket['id'];
            $item['user_id'] = $user['id'];
            $item['currency_id'] = $paymentCurrency['id'];

            unset($item['event']);

            TicketUser::create($item);
        }
    }
}
