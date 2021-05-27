<?php

include_once '../src/Service/Favorite/buildPreview.php';

function buildFavorite(string $href, string $content): array
{
    $titleExplode = explode("<title>", $content);
    $descriptionExplode = explode('description" content="', $content);
    $slashExplode = explode("/", $href);
    $host = $slashExplode[2];
    return [
        "host" => $host,
        "href" => $href,
        "title" => explode("</title>", $titleExplode[1])[0],
        "description" => substr(
            explode('"', $descriptionExplode[1])[0],
            0,
            255
        ),
        "favicon" => $slashExplode[0] . "//" . $host . "/favicon.ico",
        "preview" => buildPreview($host, $href)
    ];
}
