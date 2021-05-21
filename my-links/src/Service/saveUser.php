<?php

function saveUser (
    string $email,
    string $password,
    array $favorites,
    bool $hash = false,
    string $filename = ""): bool
{
    if ($hash) {
        $password =  password_hash($password, PASSWORD_DEFAULT);
    }
    if (!$filename) {
        $filename = './../vars/' . md5($email) . '.json';
    }
    $user = [
        "id" => null,
        "email" => $email,
        "password" => $password,
        "favorites" => $favorites,
    ];
    if (file_put_contents($filename, json_encode($user))) {
        return true;
    }
    return false;
}
