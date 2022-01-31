<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Api;

$api = new Api();
$parking = $api->createParking(4);
