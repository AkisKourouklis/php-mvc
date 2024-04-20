<?php


require 'vendor/autoload.php';

use App\Router\Router;

$request_uri = $_SERVER['REQUEST_URI'];
$request_type = $_SERVER['REQUEST_METHOD'];

Router::routeRequest($request_uri, $request_type);
