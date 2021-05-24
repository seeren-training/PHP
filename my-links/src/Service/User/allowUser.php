<?php

function allowUser($allow = true): void
{
    $userExists = array_key_exists("user", $_SESSION);
    if ($allow && !$userExists) {
        header("Location: /signin");
        exit;
    } elseif (!$allow && $userExists) {
        header("Location: /");
        exit;
    }
}
