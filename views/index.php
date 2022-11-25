<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WeatherApp</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="body">
<div class="bg"></div>

<h1 class="h1">
    Welcome traveler!
</h1>
<form action="index.php" class="form">
    <h4 class="h4">
        <?php echo "Currently ({$localTime}) in {$weatherInRiga->getLocationName()} is &#127777 {$weatherInRiga->getTemperature()}°C (feels like {$weatherInRiga->getFeelsLike()}°C &#129398;), &#128167 humidity = {$weatherInRiga->getHumidity()}% and &#127788 the wind speed = {$weatherInRiga->getWind()} m/s"; ?>
    </h4>

    <ul>
        <li>
            <a href="/?city=Riga">Riga</a>
        </li>
        <br>
        <li>
            <a href="/?city=Vilnius">Vilnius</a>
        </li>
        <br>
        <li>
            <a href="/?city=Tallinn">Tallinn</a>
        </li>
    </ul>

    <br>
    <?php $weatherInBaltics = $apiClient->getWeather($_GET["city"]); ?>
    <?php echo "Currently in {$weatherInBaltics->getLocationName()} is &#127777 {$weatherInBaltics->getTemperature()} (feels like {$weatherInBaltics->getFeelsLike()})/ &#128167 humidity = {$weatherInBaltics->getHumidity()}% and &#127788 the wind speed is {$weatherInBaltics->getWind()} m/s"; ?>
    <br>
    <br><label for="city"><?php echo $citySelection; ?></label><br>
    <br><input type="text" name="city" placeholder="Type city name here"><br>
    <input type="submit" name="submit" value="Search">
    <br>
    <br>
    <?php $weather = $apiClient->getWeather($_GET['city']); ?>
    <?php echo "Currently in {$weather->getLocationName()} is &#127777 {$weather->getTemperature()}°C (feels like {$weather->getFeelsLike()}°C)/ &#128167 humidity = {$weather->getHumidity()}% and &#127788 the wind speed is {$weather->getWind()} m/s"; ?>
    <br>
</form>
</body>
</html>
