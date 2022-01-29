<?php
namespace App;

class Bike
{
    public float $size = 0.5;

    public function __construct(private string $vin)
    {
    }

    public function getVin(): string
    {
        return $this->vin;
    }
}