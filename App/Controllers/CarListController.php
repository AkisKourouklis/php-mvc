<?php

namespace App\Controllers;

use App\Model\CarModel;

class CarListController
{
    public function index($params, $twig)
    {
        $carmodel = new CarModel();
        $cars = $carmodel->getall();
        echo $twig->render('carlist.twig', ['cars' => $cars]);
    }
}
