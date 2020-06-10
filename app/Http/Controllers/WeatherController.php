<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Region;
use App\Event;
use App\Weather;

class WeatherController extends Controller
{
    public function index (Event $event)
    {
        $event = Event::find(1);

        $region = $event->region()->first();

        $weather = $event->weather()->first();

        if ($event['date'] <= $item['dt_txt']) {
            $weathers = $this->action($region);

            foreach ($weathers['list'] as $item) {
                if ($weather['updated_at'] > date('d')) {
                    $weather = Weather::updateOrCreate(
                        [
                            'event_id' => $event['id'],
                            'region_id' => $region['id']
                        ],
                        [
                            'temp' => $item['main']['temp'],
                            'weather' => $item['weather'][0]['description'],
                            'date' => $item['dt_txt']
                        ]
                    );

                    break;
                }
            }
        }





        return $weather;
    }

    private function action(Region $region)
    {
        $link = "https://api.openweathermap.org/data/2.5/forecast?q={$region['title']}&appid=" . Config::get('app.openweathermap');

        $weather = file_get_contents($link);

        return json_decode($weather, true);
    }

    private function actualWeather ()
    {

    }
}
