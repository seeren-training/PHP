<?php

include '../src/Service/saveUser.php';

function home()
{
    if (!array_key_exists("user", $_SESSION)) {
        header("Location: /signin");
        exit;
    }
    $title = "My Link";
    $favorite = filter_input(INPUT_POST, "favorite");
    $favoriteError = null;
    if (null !== $favorite) {
        if (!filter_var($favorite, FILTER_VALIDATE_URL)) {
            $favoriteError = "Enter a valid URL";
        } else {
            $userFavorite = [
                "href" => $favorite,
                "text" => "???",
                "favicon" => "???",
            ];
            array_push($_SESSION["user"]["favorites"], $userFavorite);
            saveUser(
                $_SESSION["user"]["email"],
                $_SESSION["user"]["password"],
                $_SESSION["user"]["favorites"]
            );
            header("Location: /");
            exit;
        }
    }
    include '../templates/home/home.html.php';
}
