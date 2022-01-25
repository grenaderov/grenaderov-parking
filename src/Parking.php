<?php

namespace App;

class Parking
{
    public function __construct(private int $capacity)
    {
        if ($capacity <= 0) {
            throw new DomainException('Парковка не может быть без мест');
        }
    }

    public function getCapacity(): int
    {
        return $this->capacity;
    }
}