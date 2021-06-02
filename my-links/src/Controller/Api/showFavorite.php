<?php

include "../src/Service/User/allowUser.php";
include "../src/Service/Favorite/getFavorites.php";

function showFavorite(): void
{
    allowUser();
    $sort = filter_input(INPUT_GET, "sort");
    $offset = (int) filter_input(INPUT_GET, "offset");
    if ("asc" !== $sort) {
        $sort = "desc";
    }
    $favorites = getFavorites($sort, $offset);
    header("Content-Type: application/json");
    echo json_encode($favorites);
}
