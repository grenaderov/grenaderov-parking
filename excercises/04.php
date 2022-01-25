<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Parking;

$parking = new Parking(-6);
echo $parking->getCapacity();