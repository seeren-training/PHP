<?php

include_once '../src/Database/getConnexion.php';

function deleteFavorite(string $href): bool
{
    $dbh = getConnexion();
    $sth = $dbh->prepare("
        DELETE user_favorite, favorite
        FROM user_favorite
        JOIN favorite ON user_favorite.favorite_id = favorite.id
        WHERE favorite.href = :href;");
    $sth->execute([":href" => $href]);
    return true;
}
