<?php

namespace App\Controller;

use App\Weather\ParisCityWeatherFetcher;
use App\Weather\WeatherRequestHandler;
use App\Weather\WeatherRequestHandlerInterface;
use Buzz\Browser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CityController extends AbstractController
{
    /**
     * @Route("/{city}", name="city")
     */
    public function city(
        WeatherRequestHandlerInterface $handler,
        string $city
    ): Response {
        $weather = $handler->fetch($city);

        return $this->json($weather);
    }
}
