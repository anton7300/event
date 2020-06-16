<?php

use Illuminate\Database\Seeder;
use App\PaymentCurrency;
use App\PaymentSystem;

class PaymentSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentCurrency::query()->delete();
        PaymentSystem::query()->delete();

        $paymentSystems = [
            ['code' => 'bepaid', 'is_active' => 1, 'position' => 1],
            ['code' => 'alfa', 'is_active' => 1, 'position' => 2]
        ];

        $paymentCurrencies = [
            ['code' => 'EUR', 'position' => 1],
            ['code' => 'USD', 'position' => 2]
        ];

        foreach ($paymentSystems as $item) {
            PaymentSystem::create($item);
        }

        foreach ($paymentCurrencies as $item) {
            PaymentCurrency::create($item);
        }
    }
}
