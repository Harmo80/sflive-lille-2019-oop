<?php

namespace App\Weather\Model;

class WindMeasure
{
    private $value;

    public function __construct(int $value)
    {
        if ($value < 0) {
            throw new \InvalidArgumentException('Wind measure is invalid.');
        }

        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
