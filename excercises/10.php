<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Api;
use App\Repository;

$api = new Api(new Repository());

$parking = $api->createParking(4);

$parkingArr = $api->getAllParking();

$parking = $api->findParkingById(1);

$parking = $api->parkVehicle(1,'Truck', '12345678912345678449');

$parking = $api->parkOutVehicle(1,'12345678912345678449');

$parking = $api->deleteParking(1);

var_dump($parking);