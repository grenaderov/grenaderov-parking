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
        if ($this->findCar($car->getVin()) !== false) {
            throw new \DomainException('Автомобиль с таким VIN уже запаркован');
        }

        if (count($this->cars) === $this->capacity) {
            throw new \DomainException('Нет свободных мест');
        }

        $this->cars[] = $car;
    }

    public function parkOut(string $vin): void
    {
        $key = $this->findCar($vin);

        if ($key === false) {
            throw new \DomainException('Отпарковать автомобиль не удалось, автомобиль не найден.');
        }

        unset($this->cars[$key]);
    }

    public function findCar(string $vin): int|bool
    {
        foreach ($this->cars as $key => $val) {
            if ($val->getVin() === $vin) {
                return $key;
            }
        }

        return false;
    }
}