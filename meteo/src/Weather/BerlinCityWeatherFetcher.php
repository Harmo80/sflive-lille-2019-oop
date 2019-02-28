<?php

namespace App\Weather;

use App\Weather\Model\HumidityMeasure;
use App\Weather\Model\TemperatureMeasure;
use App\Weather\Model\WeatherApiResponse;
use App\Weather\Model\WindMeasure;
use Buzz\Browser;

class BerlinCityWeatherFetcher implements CityWeatherFetcherInterface
{
    private $browser;

    public function __construct(Browser $browser)
    {
        $this->browser = $browser;
    }

    public function getName(): string
    {
        return 'berlin';
    }

    public function fetch(): WeatherApiResponse
    {
        $res = $this->browser->get(
            'https://meteo.titouangalopin.com/berlin.json'
        );

        $data = json_decode($res->getBody()->getContents(), true);

        return new WeatherApiResponse(
            new TemperatureMeasure($data['measure']['temperature']),
            new HumidityMeasure($data['measure']['humidity']),
            new WindMeasure($data['measure']['wind'])
        );
    }
}
