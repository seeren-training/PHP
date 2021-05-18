<?php

function isSubmitted(array $form): bool
{
    foreach ($form as $value) {
        if (null === $value["value"]) {
            return false;
        }
    }
    return true;
}