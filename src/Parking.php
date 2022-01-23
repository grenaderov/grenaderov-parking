<?php

namespace App;

class Parking
{
    public $capacity;

    public function __construct(int $capacity)
    {
        $this->capacity = $capacity;
    }

}