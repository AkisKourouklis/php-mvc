<?php

namespace App\Controllers;

use App\Model\CarModel;

class ApiCarsCreateController
{

    public function index()
    {
        $company = $_POST["company"];
        $model = $_POST["model"];
        $year = $_POST["year"];
        $color = $_POST["color"];

        $car = new CarModel;
        $car->setcompany($company);

        $car->setmodel($model);

        $car->setyear($year);

        $car->setcolor($color);

        $json = json_encode($car->create());

        echo $json;
    }
}
