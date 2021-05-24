<?php

include "../src/Service/Form/getForm.php";
include '../src/Service/Form/isSubmitted.php';
include '../src/Service/Form/isValid.php';
include "../src/Service/User/allowUser.php";
include '../src/Service/User/isUser.php';

function signin(): void
{
    allowUser(false);
    $form = getForm(["email", "password"]);
    if (isSubmitted($form) && isValid($form)) {
        if (isUser($form["email"]["value"], $form["password"]["value"])) {
            header("Location: /");
            exit;
        }
        $form["email"]["error"] = "Bad credentials";
    }
    include '../templates/user/signin/signin.html.php';
}
