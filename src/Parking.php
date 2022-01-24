<?php

namespace App;

class Parking
{
    public function __construct(private int $capacity)
    {
    }

    public function getCapacity(): int
    {
        return $this->capacity;
    }
}