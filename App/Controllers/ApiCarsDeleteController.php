<?php

namespace App\Controllers;

use App\Model\CarModel;

class ApiCarsDeleteController
{
    public function index($query)
    {
        $car = new CarModel;
        $json = json_encode($car->delete($query[0]));


        echo $json;
    }
}
