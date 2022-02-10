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

    /**
    *    @dataProvider vinProvider
    */
    public function testVin($vin)
    {
        $this->assertEquals($vin, $this->vehicle->getVin());
    }

    public function vinProvider()
    {
        return [
            ['one' => '123456789']
        ];
    }

    public function testSize()
    {
        $this->assertEquals(1, $this->vehicle->getSize());
    }
}