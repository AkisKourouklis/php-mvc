<?php

require_once 'router.php';

$request_uri = $_SERVER['REQUEST_URI'];
$request_type = $_SERVER['REQUEST_METHOD'];

routeRequest($request_uri, $request_type);
