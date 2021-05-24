<?php

function getForm (array $fields): array
{
    $form = [];
    foreach ($fields as $field) {
        $form[$field] = [
            "value" => filter_input(INPUT_POST, $field),
            "error" => null
        ];
    }
    return $form;
}
