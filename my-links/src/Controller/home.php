<?php

include "../src/Service/User/allowUser.php";
include "../src/Service/Form/getForm.php";
include '../src/Service/Form/isSubmitted.php';
include '../src/Service/Form/isValid.php';
include '../src/Service/Favorite/addFavorite.php';
include '../src/Service/Favorite/deleteFavorite.php';

function home(): void
{
    allowUser(true);
    $form = getForm(["favorite"]);
    $href = filter_input(INPUT_GET, "favorite");
    if (isSubmitted($form) && isValid($form)) {
        addFavorite($form);
        header("Location: /");
        exit;
    } elseif ($href) {
        deleteFavorite($href);
        header("Location: /");
        exit;
    }
    include '../templates/home/home.html.php';
}
