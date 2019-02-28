<?php

namespace App\Weather;

use App\Weather\Model\WeatherApiResponse;

interface WeatherRequestHandlerInterface
{
    public function fetch(string $city): WeatherApiResponse;
}
