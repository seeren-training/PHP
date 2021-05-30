<?php

function exitUrl(string $url): void
{
    header(("Location: $url"));
    exit;
}
