<?php

use Illuminate\Database\Seeder;
use App\Region;
use App\Country;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::query()->delete();

        $now = date("Y-m-d H:i:s");

        $regions = [
            ["country_id" => 'BY', "title" => "Minsk", "created_at" => $now, "updated_at" => $now]
        ];

        foreach ($regions as $item) {
            $countryId = Country::whereIso($item['country_id'])->select('id')->first();

            $item['country_id'] = $countryId->id;

            Region::create($item);
        }
    }
}
