<?php

function saveUser (
    string $email,
    string $password,
    string $filename): bool
{
    $user = [
        "id" => null,
        "email" => $email,
        "password" => password_hash($password, PASSWORD_DEFAULT),
        "favorites" => [],
    ];
    if (file_put_contents($filename, json_encode($user))) {
        return true;
    }
    return false;
}
