<?php

include "../src/Service/User/allowUser.php";
include "../src/Service/Favorite/getFavorites.php";

function showFavorite(): void
{
    allowUser();
    $sort = filter_input(INPUT_GET, "sort");
    if ("asc" !== $sort) {
        $sort = "desc";
    }
    $favorites = getFavorites($sort);
    include "../templates/favorite/showFavorite.html.php";
}
