<?php

function isValid(array &$form): bool
{
    foreach ($form as $name => &$field) {
        if (!$field["value"]) {
            $field["error"] = ucfirst($name) . " is required";
        } elseif ("email" === $name && !filter_var($field["value"], FILTER_VALIDATE_EMAIL)) {
            $field["error"] = "Email invalid";
        } elseif ("password" === $name && 6 > strlen($field["value"])) {
            $field["error"] = "Password minimum length of 6";
        } elseif ("confirm" === $name && $field["value"] !== $form["password"]["value"]) {
            $field["error"] = "Confirm must match password";
        } elseif ("favorite" === $name && !filter_var($field["value"],
                FILTER_VALIDATE_URL)) {
            $field["error"] = "Enter a valid URL";
        }
    }
    foreach ($form as $value) {
        if ($value["error"]) {
            return false;
        }
    }
    return true;
}
