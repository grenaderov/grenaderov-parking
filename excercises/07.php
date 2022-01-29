<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\{Parking, Car, Bike, Truck};

$parking = new Parking(4);

$car1 = new Car('1234567891234561');
$car2 = new Bike('1234567891234562');
$car3 = new Truck('1234567891234563');
$car4 = new Bike('1234567891234564');
$car5 = new Bike('1234567891234565');

$parking->park($car1);
$parking->park($car2);
$parking->park($car3);
$parking->park($car4);
//$parking->park($car5);

print_r($parking);