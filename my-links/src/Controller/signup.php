<?php

include '../src/Service/getSignUpForm.php';
include '../src/Service/isSubmitted.php';
include '../src/Service/isValid.php';
include '../src/Service/saveUser.php';

function signup()
{
    $title = "SignUP";
    $form = getSignUpForm();
    if (isSubmitted($form) && isValid($form)) {
        $filename = './../vars/' . md5($form["email"]["value"]) . '.json';
        if (!is_file($filename)) {
            saveUser(
                $form["email"]["value"],
                $form["password"]["value"],
                $filename
            );
            header("Location: /signin");
            exit;
        }
        $form["email"]["error"] = "Email already exists";
    }
    include '../templates/signup/signup.html.php';
}
