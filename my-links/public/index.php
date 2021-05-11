<?php


$email = "cyril@seeren.fr";


$hash = md5($email);








$routeList = require './../config/routes.php';
$url = filter_input(INPUT_SERVER, "PATH_INFO");
if (null === $url) {
    $url = '/';
}

foreach ($routeList as $path => $controller) {
    if ($url === $path) {
        include "./../src/Controller/$controller";
    }
}
