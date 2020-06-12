<?php

use Illuminate\Database\Seeder;
use App\Interest;
use App\InterestCat;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Interest::query()->delete();
        InterestCat::query()->delete();

        $interestCats = [
            ['name' => 'Sport']
        ];

        $interests = [
            ['name' => 'Tennis', 'cat_id' => 'Sport'],
            ['name' => 'Football', 'cat_id' => 'Sport']
        ];

        foreach ($interestCats as $item) {
            InterestCat::create($item);
        }

        foreach ($interests as $item) {
            $catId = InterestCat::whereName($item['cat_id'])->select('id')->first();

            $item['cat_id'] = $catId->id;

            Interest::create($item);
        }
    }
}
