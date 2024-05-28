<?php

namespace App\Controllers;

$company = $_GET['company'] ?? '';
$year = $_GET['year'] ?? '';
$color = $_GET['color'] ?? '';
$availability = $_GET['availability'] ?? '';
$price = $_GET['price-filter'] ?? '';
$power = $_GET['lowest-power'] ?? '';

use App\Model\CarModel;

class CarListController
{
    public function index($params, $twig)
    {
        $filters = [
            'company' => $_GET['company'] ?? null,
            'year' => $_GET['year'] ?? null,
            'color' => $_GET['color'] ?? null,
            'price' => $_GET['price-filter'] ?? null,
            'power' => [
                'lowest' => $_GET['lowest-power'] ?? null,
                'highest' => $_GET['highest-power'] ?? null,
            ],
            'engine' => $_GET['engine'] ?? null,
            'fuel_type' => $_GET['fuel_type'] ?? null,
            'location' => $_GET['location'] ?? null,
            'drive_type' => $_GET['drive_type'] ?? null,
            'doors' => $_GET['doors'] ?? null,
        ];
        $carmodel = new CarModel();
        if (isset($_GET['q'])) {
            $cars = $carmodel->search($_GET['q']);
        } else {
            $cars = $carmodel->getall($filters);
        }
        $message = '';
        if (empty($cars)) {
            $message = 'No cars found';
        }
        echo $twig->render('carlist.twig', ['cars' => $cars, 'message' => $message]);
    }
}
