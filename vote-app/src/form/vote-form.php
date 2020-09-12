<?php

function handleRequest(stdClass $vote): array
{
    require_once __DIR__ . "/../service/entity/option-service.php";
    if (isSubmitted()) {
        $vote->question = (string)filter_input(INPUT_POST, "question");
        $vote->expiration = strtotime((string)filter_input(INPUT_POST, "expiration"));
        $vote->optionList = createOptionList(filter_input_array(INPUT_POST)["optionList"]);
        return handleError($vote);
    }
    $vote->optionList = createOptionList(["", ""]);
    return [];
}

function handleError(stdClass $vote): array
{
    $errorList = [];
    if (!$vote->question) {
        $errorList["question"] = true;
    }
    if (!$vote->expiration || time() > $vote->expiration) {
        $errorList["expiration"] = true;
    }
    foreach ($vote->optionList as $key => $option) {
        if (!$option->label) {
            $errorList["option-$key"] = true;
        }
    }
    return $errorList;
}


function isSubmitted(): bool
{
    return null !== filter_input(INPUT_POST, "vote-form");
}