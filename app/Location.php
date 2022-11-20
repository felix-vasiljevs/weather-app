<?php

namespace App;

class Location
{
    private string $apiKey = 'f6860ecc5d781f1a12003161a1ecac04';
    private int $lat;
    private int $lon;
    private string $location;

    public function __construct(string $location)
    {
        $this->location = $location;
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function getLocation(): string
    {
        $apiUrl = file_get_contents("https://api.openweathermap.org/geo/1.0/direct?q={$this->location}&limit=1&appid={$this->apiKey}");
        $cityData = json_decode($apiUrl);
        return $cityData[0];
    }

    public function getLat(): int
    {
        $apiUrl = file_get_contents("https://api.openweathermap.org/geo/1.0/direct?q={$this->location}&limit=1&appid={$this->apiKey}");
        $cityData = json_decode($apiUrl);

        $this->lat = ' ';
        foreach ($cityData as $datum) {
            if ($datum === "lat") {
                $this->lat .= $datum;
            }
        }
        return $this->lat;
    }

    public function getLon(): int
    {
        $apiUrl = file_get_contents("https://api.openweathermap.org/geo/1.0/direct?q={$this->location}&limit=1&appid={$this->apiKey}");
        $cityData = json_decode($apiUrl);

        $this->lon = ' ';
        foreach ($cityData as $datum) {
            if ($datum === "lon") {
                $this->lon  .= $datum;
            }
        }
        return $this->lon;
    }
}