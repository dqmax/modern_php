<?php 

namespace App\Weather;

class RemoteWeatherFetcher implements WeatherFetcherInterface {

    public function fetch(string $city, float $temperatureK, string $weatherType): WeatherInfo {
        return new WeatherInfo($city, $temperatureK, $weatherType);
    }
}