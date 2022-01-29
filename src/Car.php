<?php
namespace App;

class Car
{
    public float $size = 1;

    public function __construct(private string $vin)
    {
    }

    public function getVin(): string
    {
        return $this->vin;
    }
}