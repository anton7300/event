<?php

use Illuminate\Database\Seeder;
use App\TicketUser;
use App\Payment;
use App\PaymentSystem;
use App\PaymentCurrency;
use App\Event;
use App\User;
use App\Ticket;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     *
     * @return void
     */
    public function run()
    {
        Payment::query()->delete();

        $payments = [
            [
                'event' => 'Event 1',
                'user' => 'admin',
                'ticket' => 'Base',
                'currency_id' => 'USD',
                'payment_system_id' => 'bepaid',
                'amount' => 'Minsk',
                'payment_token' => 'Event 1',
                'payment_at' => '2020-10-11 12:00:00',
            ]
        ];

        foreach ($payments as $item) {
            $event = Event::whereName($item['event'])->first('id');
            $ticket = Ticket::whereTitle($item['ticket'])->where('event_id', $event['id'])->first('id');
            $user = User::whereNickname($item['user'])->first('id');
            $ticketUser = TicketUser::where('user_id', $user['id'])->where('ticket_id', $ticket['id'])->first('id');
            $paymentCurrency = PaymentCurrency::whereCode($item['currency_id'])->first('id');
            $paymentSystem = PaymentSystem::whereCode($item['payment_system_id'])->first('id');

            $item['ticket_user_id'] = $ticketUser['id'];
            $item['currency_id'] = $paymentCurrency['id'];
            $item['payment_system_id'] = $paymentSystem['id'];

            unset($item['event']);
            unset($item['user']);
            unset($item['ticket']);

            Payment::create($item);
        }
    }
}
