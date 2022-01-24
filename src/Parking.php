<?php

namespace App;

class Parking
{
    private $capacity;

    public function __construct(int $capacity)
    {
        $this->capacity = $capacity;
    }

    public function getCapacity(): int {
        return $this->capacity;
    }
}