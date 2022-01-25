<?php

namespace App;

class Parking
{
    public function __construct(private $capacity)
    {
        if (!is_int($capacity)) {
            throw new DomainException('Число должно быть целым');
        }
        if ($capacity === 0) {
            throw new DomainException('Парковка не может быть без мест');
        }
        if ($capacity < 0) {
            throw new DomainException('Укажите положительное количество мест');
        }
    }

    public function getCapacity(): int
    {
        return $this->capacity;
    }
}