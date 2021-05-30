<?php

function logout(): void
{
    session_destroy();
    header("Location: /");
    exit;
}