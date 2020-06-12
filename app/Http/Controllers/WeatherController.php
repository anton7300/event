<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Region;
use App\Event;
use App\Weather;

class WeatherController extends Controller
{
    public function get (Event $event)
    {
        $region = $event->region()->first();

        $weather = $event->weather()->first();

        if (!empty($weather)) {
            $update_at = date_parse_from_format("Y-m-d H:i:s", (string) $weather['updated_at']);

            if ($update_at['day'] < date('d')) {
                $weatherData = $this->action($event, $region);

                $event->weather()->update($weatherData);

                return $event->weather()->first();
            }

            return $weather;
        }

        $weatherData = $this->action($event, $region);

        if ($weatherData) {
            $weather = $event->weather()->create($weatherData);

            return $weather;
        }

        return null;
    }

    private function action(Event $event, Region $region)
    {
        $link = "https://api.openweathermap.org/data/2.5/forecast?q={$region['title']}&appid=" . Config::get('app.openweathermap');

        $weather = file_get_contents($link);
        $weatherArr = json_decode($weather, true);

        foreach ($weatherArr['list'] as $item) {
            if ($event['date'] <= $item['dt_txt']) {
                $weatherData = [
                    'temp' => $item['main']['temp'],
                    'weather' => $item['weather'][0]['description'],
                    'date' => $item['dt_txt']
                ];

                return $weatherData;
            }
        }

        return null;
    }
}
