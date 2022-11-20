<?php

use App\Weather;
use App\Location;

$weather = new Weather();

$citySelection = (string)readline("Type a city you are looking for: ") . PHP_EOL;
$city = new Location($citySelection);
$apiUrl = file_get_contents("https://api.openweathermap.org/geo/1.0/direct?q={$citySelection}&limit=1&appid={$city->getApiKey()}");
$cityData = json_decode($apiUrl);
var_dump($cityData[0]);

echo "Currently {$weather->getDegrees()} degrees in celsius and humidity is {$weather->getHumidity()} in city: {$citySelection}" . PHP_EOL;
