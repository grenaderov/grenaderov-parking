<?php


namespace App;


class Truck
{
    public float $size = 2;

    public function __construct(private string $vin)
    {
    }

    public function getVin(): string
    {
        return $this->vin;
    }
}