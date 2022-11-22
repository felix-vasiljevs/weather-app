<?php

require_once 'vendor/autoload.php';

use App\ApiClient;

$apiKey = 'f6860ecc5d781f1a12003161a1ecac04';

$apiClient = new ApiClient($apiKey);
$citySelection = "Type a city name you are looking for: ";

$weatherInRiga = $apiClient->getWeather("Riga");

$balticCapitalCities = ["Riga", "Vilnius", "Tallinn"];

//date_default_timezone_set('Europe/Riga');
//$date = date('h:i:s)');
//$message = "Currently in {$weather->getLocationName()} is {$weather->getTemperature()} (feels like {$weather->getFeelsLike()})/ ({$weather->getHumidity()}%) and the wind speed is {$weather->getWind()} m/s" . PHP_EOL;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WeatherApp</title>
</head>
<body>
<h2>Welcome traveler!</h2>
<form action="index.php">
    <h4>
        <?php echo "Currently in {$weatherInRiga->getLocationName()} is &#127777 {$weatherInRiga->getTemperature()}°C (feels like {$weatherInRiga->getFeelsLike()}°C &#129398;), &#128167 humidity = {$weatherInRiga->getHumidity()}% and &#127788 the wind speed = {$weatherInRiga->getWind()} m/s"; ?>
    </h4>

    <a href="/?city=Riga">Riga</a> | <a href="/?city=Vilnius">Vilnius</a> | <a href="/?city=Tallinn">Tallinn</a>
    <br>
        <?php $weatherInBaltics = $apiClient->getWeather($_GET["city"]); ?>
        <?php echo "Currently in {$weatherInBaltics->getLocationName()} is &#127777 {$weatherInBaltics->getTemperature()} (feels like {$weatherInBaltics->getFeelsLike()})/ &#128167 humidity = {$weatherInBaltics->getHumidity()}% and &#127788 the wind speed is {$weatherInBaltics->getWind()} m/s"; ?>
    <br>
    <br><label for="city"><?php echo $citySelection; ?></label><br>
    <br><input type="text" name="city"><br>
    <input type="submit" value="Search">
    <br>
    <br>
        <?php $weather = $apiClient->getWeather($_GET['city']); ?>
        <?php echo "Currently in {$weather->getLocationName()} is &#127777 {$weather->getTemperature()}°C (feels like {$weather->getFeelsLike()}°C)/ &#128167 humidity = {$weather->getHumidity()}% and &#127788 the wind speed is {$weather->getWind()} m/s"; ?>
    <br>
</form>
</body>
</html>
