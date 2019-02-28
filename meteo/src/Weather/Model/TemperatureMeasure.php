<?php

namespace App\Weather\Model;

class TemperatureMeasure
{
    private $value;

    public function __construct(float $value)
    {
        if ($value < -273.15) {
            throw new \InvalidArgumentException('Temperature measure is invalid.');
        }

        $this->value = $value;
    }

    public function getValue(): float
    {
        return $this->value;
    }
}
