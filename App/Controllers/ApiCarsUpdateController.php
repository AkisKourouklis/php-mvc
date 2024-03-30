<?php

namespace App\Controllers;

use App\Model\CarModel;

class ApiCarsUpdateController
{

    public function index($query)
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

        $json = json_encode($car->update($query[0]));

        echo $json;
    }
}
