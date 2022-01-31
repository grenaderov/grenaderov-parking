<?php

namespace App;

use App\Parking\Parking;
use App\Repository;

class Api
{
    public function createParking(int $parkingSize): Parking
    {
        $parking = new Parking($parkingSize);

        $repo = new Repository();
        $repo->save($parking);

        return $parking;
    }
}