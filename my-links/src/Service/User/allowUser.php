<?php

include_once "../src/Service/Core/exitUrl.php";

function allowUser($allow = true): void
{
    $userExists = array_key_exists("user", $_SESSION);
    if ($allow && !$userExists) {
        exitUrl("/signin");
    } elseif (!$allow && $userExists) {
        exitUrl("/");
    }
}
