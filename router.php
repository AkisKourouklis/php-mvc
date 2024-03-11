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
            '/api/cars-create' => 'ApiCarsCreateController',
            '/api/cars-update/:id' => 'ApiCarsUpdateController'
        ],
        'PUT' => [],
        'DELETE' => [
            '/api/cars-delete' => 'ApiCarsDeleteController'
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
                require_once 'controllers/' . $controllerName . '.php';

                // Create an instance of the controller and call its index method
                $controller = new $controllerName();
                $controller->index(array_slice($matches, 1));
                return;
            }
        }
    }

    // Handle 404 - Not Found
    http_response_code(404);
    echo '404 - Not Found';
}
