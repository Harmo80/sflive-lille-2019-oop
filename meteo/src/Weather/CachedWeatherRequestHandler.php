<?php

namespace App\Weather;

use App\Weather\Model\WeatherApiResponse;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class CachedWeatherRequestHandler implements WeatherRequestHandlerInterface
{
    private $rawHandler;
    private $cache;

    public function __construct(
        WeatherRequestHandlerInterface $rawHandler,
        CacheInterface $cache
    ) {
        $this->rawHandler = $rawHandler;
        $this->cache = $cache;
    }

    public function fetch(string $city): WeatherApiResponse
    {
        $handler = $this->rawHandler;

        return $this->cache->get($city,
            function (ItemInterface $item) use ($handler, $city) {
                $item->expiresAfter(5);
                return $handler->fetch($city);
            }
        );
    }
}
