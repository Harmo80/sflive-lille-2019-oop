<?php

namespace App\Weather\Model;

class WeatherApiResponse
{
    private $temperature;
    private $humidity;
    private $wind;

    public function __construct(
        TemperatureMeasure $temperature,
        HumidityMeasure $humidity,
        ?WindMeasure $wind
    ) {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->wind = $wind;
    }

    public function getTemperature(): TemperatureMeasure
    {
        return $this->temperature;
    }

    public function getHumidity(): HumidityMeasure
    {
        return $this->humidity;
    }

    public function getWind(): ?WindMeasure
    {
        return $this->wind;
    }
}
