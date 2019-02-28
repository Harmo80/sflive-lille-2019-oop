<?php

namespace App\Controller;

use Buzz\Browser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CityController extends AbstractController
{
    /**
     * @Route("/{city}", name="city")
     */
    public function city(Browser $httpClient, string $city): Response
    {
        $response = $httpClient->get(
            'https://meteo.titouangalopin.com/'.$city.'.json'
        );

        return $this->json(
            json_decode($response->getBody()->getContents(), true)
        );
    }
}
