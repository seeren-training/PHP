<?php

function isUser(string $email, string $password): bool
{
    $filename = './../vars/' . md5($email) . '.json';
    if (!is_file($filename)) {
        return false;
    }
    $user = json_decode(file_get_contents($filename), true);
    if (password_verify($password, $user["password"])) {
        $_SESSION["user"] = $user;
        return true;
    }
    return false;
}