<?php

namespace App;

use App\Parking\Parking;
use App\Parking\Vehicle;

class ApiResponse
{
    private array $response;

    public function __construct(mixed $data)
    {
        if (is_array($data)) {
            $this->response = array_map(fn($item) => $this->convertParking($item), $data);
        } else {
            $this->response = $this->convertParking($data);
        }
    }

    private function convertParking(Parking $parking): array
    {
        return [
            'id' => $parking->getId(),
            'capasity' => $parking->getCapacity(),
            'places' => array_map(fn($item) => $this->convertVehicle($item), $parking->getAllVehicle())
        ];
    }

    private function convertVehicle(Vehicle $vehicle)
    {
        return [
            'type' => $this->learnType($vehicle),
            'vin' => $vehicle->getVin(),
        ];
    }

    private function learnType(Vehicle $vehicle): string
    {
        $typeCar = explode('\\', get_class($vehicle));
        return strtolower(array_pop($typeCar));
    }

    public function getBody(): array
    {
        return $this->response;
    }
}