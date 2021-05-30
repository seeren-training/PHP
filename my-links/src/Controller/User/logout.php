<?php

include_once "../src/Service/Core/exitUrl.php";

function logout(): void
{
    session_destroy();
    exitUrl("/");
}