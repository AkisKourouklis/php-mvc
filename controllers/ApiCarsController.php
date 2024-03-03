<?php
require_once "model/CarModel.php";

class ApiCarsController
{
    public function index()
    {
        $car = new CarModel;
        $json = json_encode($car->getall());

        echo $json;
    }
}
