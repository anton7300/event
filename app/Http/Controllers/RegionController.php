<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class RegionController extends Controller
{
    public function get ($countryIso, $regionName)
    {
        $countryId = Country::whereIso($countryIso)->select('id')->first();

        $region = $countryId->regions()->firstOrCreate(
            ['title' => $regionName],
            ['country_id' => $countryId['id']]
        );

        return $region;
    }
}
