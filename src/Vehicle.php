<?php

namespace App;

class Vehicle
{
    public float $size;

    public function __construct(private string $vin)
    {
    }

    public function getVin(): string
    {
        return $this->vin;
    }

    public function getSize()
    {
        if ($this->size <= 0) {
            throw new \DomainException('Размер транспортного средства отсутствует или равен нулю');
        }

        return $this->size;
    }
}