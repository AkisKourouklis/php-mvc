<?php

namespace App\Router;

use App\Controllers\ApiCarsCreateController;
use App\Controllers\ApiCarsDeleteController;
use App\Controllers\ApiCarsSingleController;
use App\Controllers\ApiCarsUpdateController;
use App\Controllers\HomeController;
use App\Controllers\ViewCarController;

class Router
{
    private static function getTwig()
    {
        // Load the Twig library
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../views');
        return new \Twig\Environment($loader);
    }

    public static function routeRequest($url, $requestType)
    {
        // Define routes with request types
        $routes = [
            'GET' => [
                '/' => 'HomeController',
                '/car/:id' => 'ViewCarController',
                '/api/cars/:id' => 'ApiCarsSingleController',
                '/api/cars' => 'ApiCarsController'
            ],
            'POST' => [
                '/api/cars-create' => 'ApiCarsCreateController',
                '/api/cars-update/:id' => 'ApiCarsUpdateController'
            ],
            'PUT' => [],
            'DELETE' => [
                '/api/cars-delete/:id' => 'ApiCarsDeleteController'
            ]
        ];

        // Extract the path from the URL
        $path = parse_url($url, PHP_URL_PATH);

        // Check if the route exists for the given request type
        if (isset($routes[$requestType])) {
            foreach ($routes[$requestType] as $route => $controllerName) {
                // Replace :id with a regex
                $routeRegex = preg_replace('/\/:id/', '/([0-9]+)', $route);
                if (preg_match("#^$routeRegex$#", $path, $matches)) {
                    // Include the controller file
                    switch ($controllerName) {
                        case 'HomeController':
                            $controller = new HomeController;
                            break;
                        case 'ViewCarController':
                            $controller = new ViewCarController;
                            break;
                        case 'ApiCarsSingleController':
                            $controller = new ApiCarsSingleController;
                            break;
                        case 'ApiCarsCreateController':
                            $controller = new ApiCarsCreateController;
                            break;
                        case 'ApiCarsUpdateController':
                            $controller = new ApiCarsUpdateController;
                            break;
                        case 'ApiCarsDeleteController':
                            $controller = new ApiCarsDeleteController;
                            break;
                    }
                    $controller->index(array_slice($matches, 1), self::getTwig());
                    return;
                }
            }
        }

        // Handle 404 - Not Found
        http_response_code(404);
        echo '404 - Not Found';
    }
}
