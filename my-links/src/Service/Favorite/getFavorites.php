<?php

include_once '../src/Database/getConnexion.php';
include_once '../src/Service/Favorite/buildPreview.php';

function getFavorites(): array
{
    $dbh = getConnexion();
    $sth = $dbh->prepare("
        SELECT favorite.id, favorite.href, favorite.title, favorite.description
        FROM user_favorite
        JOIN favorite
        ON user_favorite.favorite_id = favorite.id
        WHERE user_favorite.user_id = :id;"
    );
    $sth->execute([
        ":id" => $_SESSION["user"]["id"]
    ]);
    $favorites = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($favorites as &$favorite) {
        $slashExplode = explode("/", $favorite["href"]);
        $host = $slashExplode[2];
        $favorite["favicon"] = $slashExplode[0] . "//" . $host . "/favicon.ico";



        $favorite["preview"] = buildPreview($host, $favorite["href"]);
    }
    return $favorites;
}
