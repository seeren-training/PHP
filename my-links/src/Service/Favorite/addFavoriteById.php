<?php

include_once '../src/Database/getConnexion.php';

function addFavoriteById(int $id): bool
{

    $dbh = getConnexion();
    $sth = $dbh->prepare("INSERT INTO `user_favorite` (`user_id`, `favorite_id`) VALUES (:user_id, :favorite_id)");
    $sth->execute([
        ":user_id" => $_SESSION['user']['id'],
        ":favorite_id" => $id,
    ]);
    return true;
}
