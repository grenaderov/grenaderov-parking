<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\{Parking, Car};

$parking = new Parking(2);

$car1 = new Car;
$car2 = new Car;
$car3 = new Car;

if (!$parking->park($car1)) {
    echo 'Автомобиль не добавлен - мест нет.';
}
if (!$parking->park($car2)) {
    echo 'Автомобиль не добавлен - мест нет.';
}
if (!$parking->park($car3)) {
    echo 'Автомобиль не добавлен - мест нет.';
}
