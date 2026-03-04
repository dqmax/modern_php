<?php

namespace App\Weather;

class FakeWeatherFetcher implements WeatherFetcherInterface {

    public function fetch(string $city, int|float $temperatureK, string $weatherType): WeatherInfo {
        return new WeatherInfo($city, $temperatureK, $weatherType);
    }
}