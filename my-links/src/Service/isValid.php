<?php

function isValid(array &$form, $confirm = true): bool
{
    if ("" === $form["email"]["value"]) {
        $form["email"]["error"] = "Email requis";
    } elseif ($form["email"]["value"]
        && !filter_var($form["email"]["value"], FILTER_VALIDATE_EMAIL)) {
        $form["email"]["error"] = "Email invalid";
    }
    if ("" === $form["password"]["value"]) {
        $form["password"]["error"] = "Password requis";
    } elseif ($form["password"]["value"]
        && 6 > strlen($form["password"]["value"])) {
        $form["password"]["error"] = "Password minimum 6";
    }
    if ($confirm && $form["confirm"]["value"] !==
        $form["password"]["value"]) {
        $form["confirm"]["error"] = "Confirm doit correspondre au mot de passe";
    }
    foreach ($form as $value) {
        if ($value["error"]) {
            return false;
        }
    }
    return true;
}