<?php

include_once '../src/Service/User/saveUser.php';

function deleteFavorite(string $href): bool
{
    foreach ($_SESSION["user"]["favorites"] as $key => $value) {
        if ($href === $value["href"]) {
            array_splice($_SESSION["user"]["favorites"], $key, 1);
            return saveUser(
                $_SESSION["user"]["email"],
                $_SESSION["user"]["password"],
                $_SESSION["user"]["favorites"]
            );
        }
    }
    return false;
}
