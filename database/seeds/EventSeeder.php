<?php

use Illuminate\Database\Seeder;
use App\Region;
use App\Event;
use App\User;
use App\Interest;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::query()->delete();

        $events = [
            [
                'region_id' => 'Minsk',
                'name' => 'Event 1',
                'date' => '2020-10-11 12:00:00',
                'location' => 'Kazimirovskaya 11',
                'description_short' => 'Event 1 short description',
                'description' => 'Event 1 description',
                'age_from' => '1990-01-01',
                'age_to' => '2000-01-01',
                'gender' => 1,
                'count_users' => 10,
                'price' => 10,
                'interest_id' => 'Tennis',
                'type' => 1,
                'is_active' => 1,
                'created_by' => 'admin'
            ]
        ];

        foreach ($events as $item) {
            $regionId = Region::whereTitle($item['region_id'])->select('id')->first();

            $item['region_id'] = $regionId->id;

            $userId = User::whereNickname($item['created_by'])->select('id')->first();

            $item['created_by'] = $userId->id;

            $interestId = Interest::whereName($item['interest_id'])->select('id')->first();

            $item['interest_id'] = $interestId->id;

            Event::create($item);
        }
    }
}
