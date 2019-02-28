<?php

namespace App\Weather;

use App\Weather\Model\WeatherApiResponse;

class WeatherRequestHandler
{
    /**
     * @var CityWeatherFetcherInterface[]
     */
    private $fetchers = [];

    /**
     * @param CityWeatherFetcherInterface[] $fetchers
     */
    public function __construct(iterable $fetchers)
    {
        foreach ($fetchers as $fetcher) {
            $this->fetchers[$fetcher->getName()] = $fetcher;
        }
    }

    public function fetch(string $city): WeatherApiResponse
    {
        if (!isset($this->fetchers[$city])) {
            throw new \InvalidArgumentException('Invalid city.');
        }

        return $this->fetchers[$city]->fetch();
    }
}
