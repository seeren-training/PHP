<?php

$url = filter_input(INPUT_SERVER, "REQUEST_URI");

if ("/votes" === $url) {
    include './../src/controller/vote-controller.php';
    showAll();
} elseif ("/votes?id=" . filter_input(INPUT_GET, "id") === $url) {
    include './../src/controller/vote-controller.php';
    show((int)filter_input(INPUT_GET, "id"));
} else {
    include './../src/controller/error-controller.php';
    show(404);
}
