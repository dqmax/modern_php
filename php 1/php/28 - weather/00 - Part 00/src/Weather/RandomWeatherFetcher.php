<?php

namespace App\Weather;

class RandomWeatherFetcher implements WeatherFetcherInterface {

    public function fetch(string $city, int|float $temperatureK, string $weatherType): WeatherInfo {
        return new WeatherInfo($city, $temperatureK, $weatherType);
    }
}