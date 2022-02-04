<?php

namespace App;

use App\Parking\Parking;
use App\Parking\Vehicle;
use App\Parking\{Car, Bike, Truck};

class Api
{
    public function __construct(private Repository $repo)
    {
    }

    public function create(int $parkingSize): Parking
    {
        $parking = new Parking($parkingSize, $this->repo->nextId());
        $this->repo->save($parking);

        return $parking;
    }

    public function getAll(): array
    {
        return $this->repo->getAll();
    }

    public function findById(int $id): Parking
    {
        return $this->repo->findById($id);
    }

    public function parkVehicle(int $idParking, string $typeVehicle, string $vin): Parking
    {
        $parking = $this->repo->findById($idParking);
        $typeVehicle = $this->makeClassName($typeVehicle);

        $car = new $typeVehicle($vin);
        $parking->park($car);
        $this->repo->save($parking);

        return $parking;
    }

    public function parkOutVehicle(int $idParking, string $vin): Parking
    {
        $parking = $this->repo->findById($idParking);
        $parking->parkOut($vin);
        $this->repo->save($parking);

        return $parking;
    }

    public function delete(int $idParking): Parking
    {
        $parking = $this->repo->findById($idParking);
        $this->repo->delete($idParking);

        return $parking;
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