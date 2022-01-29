<?php

namespace App;

abstract class Vehicle
{
    protected const SIZE = null;

    public function __construct(private string $vin)
    {
    }

    public function getVin(): string
    {
        return $this->vin;
    }

    public function getSize()
    {
        if (static::SIZE <= 0) {
            throw new \DomainException('Размер транспортного средства отсутствует или равен нулю');
        }

        return static::SIZE;
    }
}