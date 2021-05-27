<?php

function buildPreview(string $host, string $href): ?string
{
    if ("www.youtube.com" === $host) {
        $videoSplit = explode("watch?v=", $href);
        if (1 < count($videoSplit)) {
            return explode("&", $videoSplit[1])[0];
        }
    }
    return null;
}
