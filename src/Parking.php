<?php

namespace App;

use App\Car;

class Parking
{
    private array $cars = [];

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

    public function park(Car $car): bool
    {
        if (count($this->cars) === $this->capacity) {
            return false;
        }

        $this->cars[] = $car;
        return true;
    }
}