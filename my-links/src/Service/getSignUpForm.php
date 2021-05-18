<?php

function getSignUpForm (): array
{
    return [
        "email" => [
            "value" => filter_input(INPUT_POST, "email"),
            "error" => null
        ],
        "password" => [
            "value" => filter_input(INPUT_POST, "password"),
            "error" => null
        ],
        "confirm" => [
            "value" => filter_input(INPUT_POST, "confirm"),
            "error" => null
        ],
    ];;
}