<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\{Parking, Car};

$parking = new Parking(3);

$car1 = new Car('1234567891234561');
$car2 = new Car('1234567891234561');
$car3 = new Car('1234567891234563');

$parking->park($car1);
$parking->park($car2);
$parking->park($car3);

$parking->parkOut('1234567891234561');
$parking->parkOut('1234567891234563');


print_r($parking);
