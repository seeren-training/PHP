<?php

include_once '../src/Service/Favorite/buildPreview.php';

function buildFavorites(array &$favorites): array
{
    foreach ($favorites as &$favorite) {
        $slashExplode = explode("/", $favorite["href"]);
        $host = $slashExplode[2];
        $favorite["favicon"] = $slashExplode[0] . "//" . $host . "/favicon.ico";
        $favorite["preview"] = buildPreview($host, $favorite["href"]);
    }
    return $favorites;
}
