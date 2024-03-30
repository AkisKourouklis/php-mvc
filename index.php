<?php

use App\Router\Router;

spl_autoload_register(function ($class) {
    $class = str_replace("\\", "/", $class);
    require_once $class . ".php";
});

$request_uri = $_SERVER['REQUEST_URI'];
$request_type = $_SERVER['REQUEST_METHOD'];

Router::routeRequest($request_uri, $request_type);
