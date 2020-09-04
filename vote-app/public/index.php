<?php

$url = filter_input(INPUT_SERVER, "REQUEST_URI");

if ("/votes" === $url) {
    include './../src/controller/vote-controller.php';
    showAll();
} else {
    include './../src/controller/error-controller.php';
    show(404);
}
