<?php

require_once 'router.php';

$request_uri = $_SERVER['REQUEST_URI'];

routeRequest($request_uri);
