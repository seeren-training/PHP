<?php

include_once '../src/Database/getConnexion.php';

function deleteFavorite(int $id): bool
{
    $dbh = getConnexion();
    $sth = $dbh->prepare("DELETE FROM user_favorite WHERE favorite_id = :id AND user_id = :user_id; DELETE FROM favorite WHERE id = :id;");
    $sth->execute([
        ":id" => $id,
        ":user_id" => $_SESSION["user"]["id"]
    ]);
    return true;
}
