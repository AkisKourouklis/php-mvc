<?php

namespace App\Controllers;

use App\Model\CarModel;

class HomeController
{
    public function index($params, $twig)
    {
        $carmodel = new CarModel();
        $cars = $carmodel->getall();
        echo $twig->render('home.twig', ['cars' => $cars]);
    }
}
