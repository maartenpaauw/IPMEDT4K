<?php

namespace IPMEDT4K\Http\Controllers\API;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use IPMEDT4K\Http\Controllers\Controller;

class WeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        // Wind directions
        $dirs = array('N', 'NO', 'O', 'ZO', 'Z', 'ZW', 'W', 'NW', 'N');

        // Icons
        $icons = json_decode(file_get_contents(storage_path('app/icons.json')), true);

        // New Guzzle Client.
        $client = new Client();

        // Make the request.
        $res = $client->request(
            'GET',
            'http://api.openweathermap.org/data/2.5/weather',
            [
                'query' => [
                    'lat' => '52.1583',
                    'lon' => '4.4931',
                    'units' => 'metric',
                    'lang' => 'nl',
                    'appid' => env('OPEN_WEATHER_API_KEY'),
                ],
            ]
        );

        // Check the status code.
        if ($res->getStatusCode() === 200) {

            // Body
            $body = json_decode($res->getBody(), true);

            // Icon class.
            $prefix = 'wi wi-';
            $code = $body['weather'][0]['id'];
            $icon = $icons[$code]['icon'];

            // If we are not in the ranges mentioned above, add a day/night prefix.
            if (!($code > 699 && $code < 800) && !($code > 899 && $code < 1000)) {

                // Append day to icon class.
                $icon = 'day-'.$icon;
            }

            // Finally tack on the prefix.
            $icon = $prefix.$icon;

            // Overwrite it with the symbol we need.
            $body['weather'][0]['icon'] = $icon;

            // Add the wind direction.
            $body['wind']['dir'] = $dirs[(int) round($body['wind']['deg'] / 45)];

            // Return the body.
            return response($body);
        }
    }
}
