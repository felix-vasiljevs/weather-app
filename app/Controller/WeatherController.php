<?php

namespace App\Controller;

use App\Model\ApiClient;

class WeatherController
{
    public function weather()
    {
        (new ApiClient())->getWeather();
    }

    public function location()
    {
        (new ApiClient())->getLocation();
    }
}