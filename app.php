<?php
require_once __DIR__ . './vendor/autoload.php';

use App\Api;
use App\ApiException;
use App\Repository;

try {
    if (!isset($argv[1])) {
        throw new \DomainException('Не указан метод вызова');
    }

    $api = new Api(new Repository('./data/'));

    if (!method_exists($api, $argv[1])) {
        throw new \DomainException('Метод вызова не найден');
    }

    $args = array_filter($argv, fn($key) => $key > 1, ARRAY_FILTER_USE_KEY);

    echo json_encode($api->{$argv[1]}(...$args)->getBody());

} catch (ApiException $e) {
    echo $e->getMessage();
} catch (\Throwable $e) {
    echo $e->getMessage();
}