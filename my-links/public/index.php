<?php

session_start();

$routeList = require './../config/routes.php';
$url = filter_input(INPUT_SERVER, "PATH_INFO");

if (null === $url) {
    $url = '/';
}

foreach ($routeList as $path => $route) {
    if ($url === $path) {
        include "./../src/Controller/" . $route['controller'];
        $route['action']();
    }
}

