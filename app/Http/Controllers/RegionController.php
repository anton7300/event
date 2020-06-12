<?php

namespace App\Http\Controllers;

use App\Country;
use App\Event;

class RegionController extends Controller
{
    public function set (Event $event, string $countryIso, string $regionName)
    {
        $countryId = Country::whereIso($countryIso)->select('id')->first();

        $region = $countryId->regions()->firstOrCreate(
            ['title' => $regionName],
            ['country_id' => $countryId['id']]
        );

        $event->region()->associate($region)->save();

        return true;
    }
}
