<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Api;
use App\Repository;

$api = new Api(new Repository());

$parking = $api->create(4);

$parkingArr = $api->getAll();

$parking = $api->findById(1);

$parking = $api->parkVehicle(1,'Car', '12345678912345678449');

$parking = $api->parkOutVehicle(1,'12345678912345678449');

$parking = $api->delete(1);

var_dump($parking);