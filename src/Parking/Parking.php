<?php

namespace App\Parking;

use App\Parking\Vehicle;

class Parking
{
    private array $cars = [];

    public function __construct(private int $capacity, private int $id)
    {
        if ($capacity <= 0) {
            throw new \DomainException('Парковка не может быть без мест');
        }
    }

    private function getCapacity(): int
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

    private function findCar(string $vin): ?int
    {
        foreach ($this->cars as $key => $val) {
            if ($val->getVin() === $vin) {
                return $key;
            }
        }

        return null;
    }

    private function countOccupied(): float
    {
        return array_sum(array_map(fn(Vehicle $item) => $item->getSize(), $this->cars));
    }

    private function possiblePark(Vehicle $car): bool
    {
        return $this->countOccupied() + $car->getSize() <= $this->capacity;
    }

    public function getId(): int
    {
        return $this->id;
    }
}