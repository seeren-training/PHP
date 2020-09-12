<?php

$url = filter_input(INPUT_SERVER, "REQUEST_URI");

if ("/votes/create" === $url) {
    require __DIR__ . '/../src/controller/vote-controller.php';
    create();
} elseif ("/votes" === $url) {
    require __DIR__ . '/../src/controller/vote-controller.php';
    showAll();
} elseif (($id = (int)filter_input(INPUT_GET, "id")) && "/votes?id=$id" === $url) {
    require __DIR__ . '/../src/controller/vote-controller.php';
    show($id);
} else {
    require './../src/controller/error-controller.php';
    show(404);
}
