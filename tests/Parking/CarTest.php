<?php

use App\Parking\Car;
use PHPUnit\Framework\TestCase;

class CarTest extends TestCase
{
    private Car $vehicle;

    protected function setUp(): void
    {
        $this->vehicle = new Car('123456789');
    }

    public function testVin() {
        $this->assertEquals('123456789', $this->vehicle->getVin());
    }

    public function testSize() {
        $this->assertEquals(1, $this->vehicle->getSize());
    }
}