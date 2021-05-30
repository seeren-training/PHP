<?php

include "../src/Service/Form/getForm.php";
include '../src/Service/Form/isSubmitted.php';
include '../src/Service/Form/isValid.php';
include "../src/Service/User/allowUser.php";
include '../src/Service/User/saveUser.php';

function signup(): void
{
    allowUser(false);
    $form = getForm(["email", "password", "confirm"]);
    if (isSubmitted($form) && isValid($form)) {
        if (saveUser($form["email"]["value"], $form["password"]["value"])) {
            header("Location: /signin");
            exit;
        }
        $form["email"]["error"] = "User already exists";
    }
    include "../templates/user/signup/signup.html.php";
}
