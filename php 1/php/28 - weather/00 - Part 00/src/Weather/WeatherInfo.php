<?php

namespace App\Weather;

class WeatherInfo {
    public function __construct(
        public string $city,
        public float $temperatureK,
        public string $weatherType
    ) {}
}