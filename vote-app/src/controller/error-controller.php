<?php

function show(int $statusCode): void
{
    $statusText = [
        404 => "Not Found",
        500 => "Internal Server Error",
    ];
    header("HTTP/1.1 $statusCode $statusText[$statusCode]");
    header("Content-Type: text/html; charset=utf-8");
    require "./../templates/error/show.html.php";
}
