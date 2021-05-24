<?php

function saveUser(
    string $email,
    string $password,
    array $favorites = null,
): bool
{
    if (!$favorites) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $favorites = [];
    }
    if (file_put_contents("./../vars/" . md5($email) . ".json", json_encode([
            "email" => $email,
            "password" => $password,
            "favorites" => $favorites,
        ], JSON_PRETTY_PRINT)
    )) {
        return true;
    }
    return false;
}
