<?php

function isSubmitted(array $form): bool
{
    foreach ($form as $field) {
        if (null === $field["value"]) {
            return false;
        }
    }
    return true;
}
