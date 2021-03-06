<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CountrySeeder::class,
            RegionSeeder::class,
            UserSeeder::class,
            InterestSeeder::class,
            EventSeeder::class
        ]);
    }
}
