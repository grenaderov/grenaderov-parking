<?php

namespace App;

use App\Vehicle;

class Parking
{
    public array $cars = [];

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

    public function park(Vehicle $car): void
    {
        if (!is_null($this->findCar($car->getVin()))) {
            throw new \DomainException('Автомобиль с таким VIN уже запаркован');
        }

        if (!$this->possiblePark($car)) {
            throw new \DomainException('Нет свободных мест');
        }

        $this->cars[] = $car;
    }

    public function parkOut(string $vin): void
    {
        $key = $this->findCar($vin);

        if (is_null($key)) {
            throw new \DomainException('Отпарковать автомобиль не удалось, автомобиль не найден.');
        }

        unset($this->cars[$key]);

        $this->cars = array_values($this->cars);
    }

    public function findCar(string $vin): ?int
    {
        foreach ($this->cars as $key => $val) {
            if ($val->getVin() === $vin) {
                return $key;
            }
        }

        return null;
    }

    public function countOccupied(): int
    {
        return array_sum(array_map(fn($item) => $item->getSize(), $this->cars));
    }

    public function possiblePark(object $car): bool
    {
        $countOccupied = $this->countOccupied();

        return $countOccupied + $car->getSize() <= $this->capacity;
    }
}