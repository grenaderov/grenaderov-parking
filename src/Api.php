<?php

namespace App;

use App\Parking\Parking;

class Api
{
    public function createParking(int $parkingSize): Parking
    {
        return new Parking($parkingSize);
    }
}