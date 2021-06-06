<?php

include "../src/Service/User/allowUser.php";
include "../src/Service/Favorite/getFavorites.php";
include '../src/Service/Favorite/addFavoriteById.php';
include '../src/Service/Favorite/getUserFavorites.php';

function showFavorite(): void
{
    allowUser();
    $id = (int) filter_input(INPUT_GET, "favorite");
    if ($id) {
        var_dump($id);
        addFavoriteById($id);
        exitUrl("/");
    }
    $sort = filter_input(INPUT_GET, "sort");
    if ("asc" !== $sort) {
        $sort = "desc";
    }
    $favorites = getFavorites($sort);
    foreach (getUserFavorites() as $userFavorite) {
        foreach ($favorites as &$value) {
            if ($userFavorite["href"] === $value["href"]){
                $value["has"] = true;
                continue;
            }
        }
    }
    include "../templates/favorite/showFavorite.html.php";
}
