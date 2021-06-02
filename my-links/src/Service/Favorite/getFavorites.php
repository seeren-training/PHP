<?php

include_once '../src/Database/getConnexion.php';
include_once '../src/Service/Favorite/buildPreview.php';
include_once '../src/Service/Favorite/buildFavorites.php';

function getFavorites(string $sort, int $offset = 0): array
{
    $dbh = getConnexion();
    $sth = $dbh->prepare("
        SELECT `id`, `href`, `title`, `description`
        FROM `favorite`
        GROUP BY `href`
        ORDER BY `id` $sort
        LIMIT 5
        OFFSET $offset");
    $sth->execute();
    $favorites = $sth->fetchAll(PDO::FETCH_ASSOC);
    return buildFavorites($favorites);
}
