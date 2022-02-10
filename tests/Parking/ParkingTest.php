<?php

use App\Parking\Parking;
use PHPUnit\Framework\TestCase;

class ParkingTest extends TestCase
{
    public function testCreate() {
        $this->expectException(\DomainException::class);
        $this->expectExceptionMessage('Парковка не может быть без мест');

        $parking = new Parking(0, 1);
    }
}