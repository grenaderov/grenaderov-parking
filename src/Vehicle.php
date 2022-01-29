<?php

namespace App;

abstract class Vehicle
{
    const SIZE = 1;

    public function __construct(private string $vin)
    {
    }

    public function getVin(): string
    {
        return $this->vin;
    }

    public function getSize()
    {
        if (self::SIZE <= 0) {
            throw new \DomainException('Размер транспортного средства отсутствует или равен нулю');
        }

        return self::SIZE;
    }
}