<?php

function routeRequest($url)
{
    // Define routes
    $routes = [
        '/' => 'HomeController',
        '/cars' => 'CarsController'
    ];

    // Extract the path from the URL
    $path = parse_url($url, PHP_URL_PATH);

    // Check if the route exists
    if (array_key_exists($path, $routes)) {
        // Include the controller file
        require_once 'controllers/' . $routes[$path] . '.php';

        // Create an instance of the controller and call its index method
        $controllerName = $routes[$path];
        $controller = new $controllerName();
        $controller->index();
    } else {
        // Handle 404 - Not Found
        http_response_code(404);
        echo '404 - Not Found';
    }
}
