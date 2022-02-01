<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Api;
use App\Repository;

$api = new Api(new Repository());
$parking = $api->createParking(4);

