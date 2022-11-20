<?php

namespace App;

class Weather
{
    private string $apiKey = 'f6860ecc5d781f1a12003161a1ecac04';
    private int $degrees;
    private int $humidity;

    public function getWeatherData (Location $location): int
    {
        $weatherResponse = file_get_contents("https://api.openweathermap.org/data/2.5/weather/?lat={$location->getLat()}&lon={$location->getLon()}&appid={$this->apiKey}&units=metric");
        return json_decode($weatherResponse);

    }

    public function getDegrees(): int
    {
        return $this->degrees;
    }

    public function getHumidity(): int
    {
        return $this->humidity;
    }
}
