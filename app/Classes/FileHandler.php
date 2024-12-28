<?php

namespace App\Classes;

trait FileHandler
{
    public function readData()
    {
        $data = file_get_contents(__DIR__ . '/../../data/vehicles.json');
        return json_decode($data, true);
    }

    public function writeData($data)
    {
        file_put_contents(__DIR__ . '/../../data/vehicles.json', json_encode($data, JSON_PRETTY_PRINT));
    }
}
