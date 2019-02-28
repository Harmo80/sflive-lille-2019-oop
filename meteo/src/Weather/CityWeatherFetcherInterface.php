<?php

namespace App\Weather;

use App\Weather\Model\WeatherApiResponse;

interface CityWeatherFetcherInterface
{
    public function fetch(): WeatherApiResponse;
    public function getName(): string;
}
