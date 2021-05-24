<?php

include_once '../src/Service/User/saveUser.php';

function addFavorite(array $form): bool
{
    $href = $form["favorite"]["value"];
    $content = file_get_contents($href );
    if ($content) {
        $slashExplode = explode("/", $href );
        $titleExplode = explode("<title>", $content);
        $descriptionExplode = explode('description" content="', $content);
        $host = $slashExplode[2];
        $preview = null;
        if ("www.youtube.com" === $host) {
            $videoSplit = explode("watch?v=", $href );
            if (1 < count($videoSplit)) {
                $preview = explode("&", $videoSplit[1])[0];
            }
        }
        $favorite = [
            "host" => $host,
            "href" => $href ,
            "title" => explode("</title>", $titleExplode[1])[0],
            "description" => explode('">', $descriptionExplode[1])[0],
            "favicon" => $slashExplode[0] . "//" . $host . "/favicon.ico",
            "preview" => $preview
        ];
        array_push($_SESSION["user"]["favorites"], $favorite);
        return saveUser(
            $_SESSION["user"]["email"],
            $_SESSION["user"]["password"],
            $_SESSION["user"]["favorites"]
        );
    }
    return false;
}