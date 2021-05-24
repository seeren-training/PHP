<?php

return [
    "/" => [
        "controller" => "home.php",
        "action" => "home"
    ],
    "/signup" => [
        "controller" => "User/signup.php",
        "action" => "signup"
    ],
    "/signin" => [
        "controller" => "User/signin.php",
        "action" => "signin"
    ],
    "/logout" => [
        "controller" => "User/logout.php",
        "action" => "logout"
    ],
];
