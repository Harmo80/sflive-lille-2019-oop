<?php

namespace App\Weather;

use App\Weather\Model\HumidityMeasure;
use App\Weather\Model\TemperatureMeasure;
use App\Weather\Model\WeatherApiResponse;
use App\Weather\Model\WindMeasure;
use Buzz\Browser;

class LondonCityWeatherFetcher implements CityWeatherFetcherInterface
{
    private $browser;

    public function __construct(Browser $browser)
    {
        $this->browser = $browser;
    }

    public function getName(): string
    {
        return 'london';
    }

    public function fetch(): WeatherApiResponse
    {
        $res = $this->browser->get(
            'https://meteo.titouangalopin.com/london.json'
        );

        $data = json_decode($res->getBody()->getContents(), true);

        return new WeatherApiResponse(
            new TemperatureMeasure($data['temperature']),
            new HumidityMeasure($data['humidity']),
            null
        );
    }
}
