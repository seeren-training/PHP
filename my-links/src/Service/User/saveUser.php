<?php

include '../src/Database/getConnexion.php';

function saveUser(string $email, string $password): bool
{
    $dbh = getConnexion();
    $sth = $dbh->prepare("INSERT INTO `user` (`email`, `password`) VALUES (:email, :password);");
    try {
        $sth->execute([
            ":email" => $email,
            ":password" => password_hash($password, PASSWORD_DEFAULT)
        ]);
    } catch (PDOException $e) {
        return false;
    }
    return true;
}
