<?php

function routeRequest($url, $requestType)
{
    // Define routes with request types
    $routes = [
        'GET' => [
            '/' => 'HomeController',
            '/cars' => 'ViewCarsController',
            '/api/cars/:id' => 'ApiCarsSingleController',
            '/api/cars' => 'ApiCarsController'
        ],
        'POST' => [
            '/api/cars-create' => 'ApiCarsCreateController'
        ],
        'PUT' => [
            '/api/cars-update' => 'ApiCarsUpdateController'
        ],
        'DELETE' => [
            '/api/cars-delete' => 'ApiCarsDeleteController'
        ]
    ];

    // Extract the path from the URL
    $path = parse_url($url, PHP_URL_PATH);

    // Check if the route exists for the given request type
    if (isset($routes[$requestType]) && array_key_exists($path, $routes[$requestType])) {
        // Include the controller file
        require_once 'controllers/' . $routes[$requestType][$path] . '.php';

        // Create an instance of the controller and call its index method
        $controllerName = $routes[$requestType][$path];
        $controller = new $controllerName();
        $controller->index();
    } else {
        // Handle 404 - Not Found
        http_response_code(404);
        echo '404 - Not Found';
    }
}
