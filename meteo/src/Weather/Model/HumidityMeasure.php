<?php

namespace App\Weather\Model;

class HumidityMeasure
{
    private $value;

    public function __construct(int $value)
    {
        if ($value < 0 || $value > 100) {
            throw new \InvalidArgumentException('Humidity measure is invalid.');
        }

        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
