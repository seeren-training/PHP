<?php

include "../src/Service/User/allowUser.php";
include "../src/Service/Form/getForm.php";
include '../src/Service/Form/isSubmitted.php';
include '../src/Service/Form/isValid.php';
include '../src/Service/Favorite/getUserFavorites.php';
include '../src/Service/Favorite/addFavorite.php';
include '../src/Service/Favorite/deleteFavoriteById.php';
include_once "../src/Service/Core/exitUrl.php";

function home(): void
{
    allowUser(true);
    $form = getForm(["favorite"]);
    $id = filter_input(INPUT_GET, "favorite");
    if (isSubmitted($form) && isValid($form)) {
        addFavorite($form);
        exitUrl("/");
    }
    if ($id) {
        deleteFavorite($id);
        exitUrl("/");
    }
    $favorites = getUserFavorites();
    include '../templates/home/home.html.php';
}
