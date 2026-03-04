<?php 

namespace App\Weather;

interface WeatherFetcherInterface {
    public function fetch(string $city, float $temperatureK, string $weatherType): WeatherInfo;
}

