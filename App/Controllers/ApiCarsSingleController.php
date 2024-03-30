<?php

namespace App\Controllers;

use App\Model\CarModel;

class ApiCarsSingleController
{
    public function index($query)
    {
        $car = new CarModel;
        $json = json_encode($car->get($query[0]));


        echo $json;
    }
}
