<?php
require_once "model/CarModel.php";

class ApiCarsSingleController
{
    public function index($query)
    {
        $car = new CarModel;
        $json = json_encode($car->get($query[0]));


        echo $json;
    }
}
