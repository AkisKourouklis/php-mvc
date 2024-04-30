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
        $price = $_POST["price"];
        $power = $_POST["power"];
        $engine = $_POST["engine"];
        $image = $_POST["image"];
        $mileage = $_POST["mileage"];
        $fuel_type = $_POST["fuel_type"];
        $location = $_POST["location"];
        $drive_type = $_POST["drive_type"];
        $doors = $_POST["doors"];

        $car = new CarModel;

        $car->setcompany($company);

        $car->setmodel($model);

        $car->setyear($year);

        $car->setcolor($color);

        $car->setprice($price);

        $car->setpower($power);

        $car->setengine($engine);

        $car->setimage($image);

        $car->setmileage($mileage);

        $car->setfuel_type($fuel_type);

        $car->setlocation($location);

        $car->setdrive_type($drive_type);

        $car->setdoors($doors);

        $json = json_encode($car->update($query[0]));

        echo $json;
    }
}
