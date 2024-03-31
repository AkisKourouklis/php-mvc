<?php

namespace App\Controllers;

use App\Model\CarModel;

class ViewCarController
{

    public function index($params, $twig)
    {
        $carmodel = new CarModel();
        $id = $params[0]; // Get the ID from the route parameters
        $car = $carmodel->get($id);

        echo $twig->render('car.twig', ['car' => $car]);
    }
}
