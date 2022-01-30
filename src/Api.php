<?php

namespace App;

use App\Parking;

class Api
{
    public function createParking(int $parkingSize): Parking
    {
        return new Parking($parkingSize);
    }
}