<?php

namespace App;


class Car
{
    private $vin;

    public function __construct(string $vin)
    {
        $this->vin = $vin;
    }

    public function getVin(): string
    {
        return $this->vin;
    }
}