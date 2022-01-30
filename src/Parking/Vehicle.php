<?php

namespace App\Parking;

abstract class Vehicle
{
    protected const SIZE = null;

    public function __construct(private string $vin)
    {
        if (static::SIZE <= 0) {
            throw new \DomainException('Размер транспортного средства отсутствует или равен нулю');
        }
    }

    public function getVin(): string
    {
        return $this->vin;
    }

    public function getSize(): float
    {
        return static::SIZE;
    }
}