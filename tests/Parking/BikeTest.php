<?php

use App\Parking\Bike;
use PHPUnit\Framework\TestCase;

class BikeTest extends TestCase
{
    private Bike $vehicle;

    protected function setUp(): void
    {
        $this->vehicle = new Bike('123456789');
    }

    public function testVin() {
        $this->assertEquals('123456789', $this->vehicle->getVin());
    }

    public function testSize() {
        $this->assertEquals(0.5, $this->vehicle->getSize());
    }
}