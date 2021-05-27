<?php


include '../src/Database/getConnexion.php';

function isUser(string $email, string $password): bool
{
    $dbh = getConnexion();
    $sth = $dbh->prepare("SELECT `id`, `password` FROM `user` WHERE `email` = :email");
    $sth->execute([":email" => $email,]);
    $user = $sth->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user["password"])) {
        $user["email"] = $email;
        $_SESSION["user"] = $user;
        return true;
    }
    return false;
}