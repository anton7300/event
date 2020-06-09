<?php

use Illuminate\Database\Seeder;
use App\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::query()->delete();

        $now = date("Y-m-d H:i:s");

        Country::insert([
            [
                'title' => 'Belarus',
                'iso' => 'by',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'title' => 'Russia',
                'iso' => 'ru',
                'created_at' => $now,
                'updated_at' => $now
            ]
        ]);
    }
}
