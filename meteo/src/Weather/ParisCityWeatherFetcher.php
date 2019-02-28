<?php

namespace App\Weather;

use App\Weather\Model\HumidityMeasure;
use App\Weather\Model\TemperatureMeasure;
use App\Weather\Model\WeatherApiResponse;
use App\Weather\Model\WindMeasure;
use Buzz\Browser;

class ParisCityWeatherFetcher implements CityWeatherFetcherInterface
{
    private $browser;

    public function __construct(Browser $browser)
    {
        $this->browser = $browser;
    }

    public function getName(): string
    {
        return 'paris';
    }

    public function fetch(): WeatherApiResponse
    {
        $res = $this->browser->get(
            'https://meteo.titouangalopin.com/paris.json'
        );

        $data = json_decode($res->getBody()->getContents(), true);

        return new WeatherApiResponse(
            new TemperatureMeasure($data['temperature']),
            new HumidityMeasure($data['humidity']),
            new WindMeasure($data['wind'])
        );
    }
}
