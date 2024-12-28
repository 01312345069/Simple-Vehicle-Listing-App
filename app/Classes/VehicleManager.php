<?php

namespace App\Classes;

class VehicleManager extends VehicleBase implements VehicleActions
{
    use FileHandler;

    public function __construct($name, $type, $price, $image)
    {
        parent::__construct($name, $type, $price, $image);
    }

    public function addVehicle($data)
    {
        $vehicles = $this->getVehicles();
        $vehicles[] = $data;
        $this->writeData($vehicles);
    }

    public function editVehicle($id, $data)
    {
        $vehicles = $this->getVehicles();
        if (isset($vehicles[$id])) {
            $vehicles[$id] = $data;
            $this->writeData($vehicles);
        }
    }

    public function deleteVehicle($id)
    {
        $vehicles = $this->getVehicles();
        if (isset($vehicles[$id])) {
            unset($vehicles[$id]);
            $vehicles = array_values($vehicles);  // Re-index the array
            $this->writeData($vehicles);
        }
    }

    public function getVehicles()
    {
        return $this->readData();
    }

    public function getDetails()
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'price' => $this->price,
            'image' => $this->image
        ];
    }
}
