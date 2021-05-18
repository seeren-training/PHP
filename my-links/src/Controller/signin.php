<?php

include '../src/Service/getSignUpForm.php';
include '../src/Service/isSubmitted.php';
include '../src/Service/isValid.php';
include '../src/Service/isUser.php';

function signin()
{
    $title = "SignIn";
    $form = getSignUpForm(false);
    if (isSubmitted($form) && isValid($form, false)) {
        if (isUser($form["email"]["value"], $form["password"]["value"])) {
            header("Location: /");
            exit;
        }
        $form["email"]["error"] = "Bad credentials";
    }
    include '../templates/signin/signin.html.php';
}
