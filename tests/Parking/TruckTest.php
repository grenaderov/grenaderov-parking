<?php

use App\Parking\Truck;
use PHPUnit\Framework\TestCase;

class TruckTest extends TestCase
{
    private Truck $vehicle;

    protected function setUp(): void
    {
        $this->vehicle = new Truck('123456789');
    }

    public function testVin() {
        $this->assertEquals('123456789', $this->vehicle->getVin());
    }

    public function testSize() {
        $this->assertEquals(2, $this->vehicle->getSize());
    }
}