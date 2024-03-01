<?php

class CarsController
{

    public function index()
    {
        $cars = new CarModel();
        $cars->get();

        require_once 'views/car.php';
    }
}
