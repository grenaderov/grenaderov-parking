<?php

namespace App;

use App\Parking\Parking;

class Api
{
    public function __construct(private Repository $repo)
    {
    }

    public function createParking(int $parkingSize): Parking
    {
        $parking = new Parking($parkingSize, $this->repo->nextId());
        $this->repo->save($parking);

        return $parking;
    }
}