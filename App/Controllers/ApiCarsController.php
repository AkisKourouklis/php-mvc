<?php

namespace App\Controllers;

use App\Model\CarModel;

class ApiCarsController
{
    public function index()
    {
        $car = new CarModel;
        $json = json_encode($car->getall());

        echo $json;
    }
}
