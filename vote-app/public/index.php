<?php

header("HTTP/1.1 200 OK");
header("Content-Type: text/html; charset=utf-8");

$title = "Mon title";

include './../templates/vote-list.html.php';
