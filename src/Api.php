<?php

namespace App;

use App\ApiResponse;
use App\ApiException;
use App\Parking\Parking;
use App\Parking\Vehicle;
use App\Parking\{Car, Bike, Truck};


class Api
{
    public function __construct(private Repository $repo)
    {
    }

    public function create(int $parkingSize): ApiResponse
    {
        try {
            $parking = new Parking($parkingSize, $this->repo->nextId());
            $this->repo->save($parking);

            return new ApiResponse($parking);
        } catch (\DomainException $e) {
            throw new ApiException($e->getMessage(), 0, $e);
        }
    }

    public function getAll(): ApiResponse
    {
        try {
            return new ApiResponse($this->repo->getAll());
        } catch (\DomainException $e) {
            throw new ApiException($e->getMessage(), 0, $e);
        }
    }

    public function findById(int $id): ApiResponse
    {
        try {
            $parking = $this->repo->findById($id);

            return new ApiResponse($parking);
        } catch (\DomainException $e) {
            throw new ApiException($e->getMessage(), 0, $e);
        }
    }

    public function parkVehicle(int $idParking, string $typeVehicle, string $vin): ApiResponse
    {
        try {
            $parking = $this->repo->findById($idParking);
            $typeVehicle = $this->makeClassName($typeVehicle);

            $car = new $typeVehicle($vin);
            $parking->park($car);
            $this->repo->save($parking);

            return new ApiResponse($parking);
        } catch (\DomainException $e) {
            throw new ApiException($e->getMessage(), 0, $e);
        }
    }

    public function parkOutVehicle(int $idParking, string $vin): ApiResponse
    {
        try {
            $parking = $this->repo->findById($idParking);
            $parking->parkOut($vin);
            $this->repo->save($parking);

            return new ApiResponse($parking);
        } catch (\DomainException $e) {
            throw new ApiException($e->getMessage(), 0, $e);
        }
    }

    public function delete(int $idParking): ApiResponse
    {
        try {
            $parking = $this->repo->findById($idParking);
            $this->repo->delete($idParking);

            return new ApiResponse($parking);
        } catch (\DomainException $e) {
            throw new ApiException($e->getMessage(), 0, $e);
        }
    }

    private function makeClassName(string $class): string
    {
        $class = 'App\\Parking\\' . $class;

        if (!is_subclass_of($class, 'App\\Parking\\Vehicle')) {
            throw new \DomainException('Класс не является наследником класса Vehicle');
        }

        if (!class_exists($class)) {
            throw new \DomainException('Неправильный тип ТС');
        }

        return $class;
    }
}