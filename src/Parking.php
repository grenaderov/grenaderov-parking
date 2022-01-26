<?php

namespace App;

use App\Car;

class Parking
{
    private array $cars = [];

    public function __construct(private int $capacity)
    {
        if ($capacity <= 0) {
            throw new \DomainException('Парковка не может быть без мест');
        }
    }

    public function getCapacity(): int
    {
        return $this->capacity;
    }

    public function park(Car $car): void
    {
        if ($this->findCar($car->getVin())) {
            throw new \DomainException('Автомобиль с таким VIN уже запаркован');
        }

        if (count($this->cars) === $this->capacity) {
            throw new \DomainException('Нет свободных мест');
        }

        $this->cars[] = $car;
    }

    public function parkOut(string $vin): void
    {
        if ($this->findCar($vin)) {
            $this->cars = array_filter($this->cars, fn($val) => $val->getVin() !== $vin);
        }
    }

    public function findCar(string $vin): int|object
    {
        foreach ($this->cars as $val) {
            if ($val->getVin() === $vin) {
                return true;
            }
        }

        return false;
    }
}