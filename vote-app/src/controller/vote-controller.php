<?php

function showAll(): void
{
    include "./../src/entity/vote.php";
    $voteList = [];
    header("HTTP/1.1 200 OK");
    header("Content-Type: text/html; charset=utf-8");
    include __DIR__ . '/../../templates/vote/show-all.html.php';
}

function show(int $id): void
{
    include "./../src/entity/vote.php";
    $voteList = [];
    $vote = null;
    foreach ($voteList as $value) {
        if ($id === $value->id) {
            $vote = $value;
            break;
        }
    }
    header("HTTP/1.1 200 OK");
    header("Content-Type: text/html; charset=utf-8");
    include __DIR__ . '/../../templates/vote/show.html.php';
}

function create(): void
{
    include __DIR__ . "/../entity/vote.php";
    include __DIR__ . "/../entity/option.php";
    $errorList = [];
    $vote = newVote();
    $option1 = newOption();
    $option2 = newOption();
    $option1->label = "Option 1";
    $option2->label = "Option 2";
    $vote->optionList[] = $option1;
    $vote->optionList[] = $option2;
    if (null !== filter_input(INPUT_POST, "vote-form")) {
        if (!($vote->question = filter_input(INPUT_POST, "question"))) {
            $errorList["question"] = true;
        }
        if (!($vote->expiration = filter_input(INPUT_POST, "expiration"))
            || time() > strtotime($vote->expiration)) {
            $errorList["expiration"] = true;
        }
        foreach (filter_input_array(INPUT_POST)["optionList"] as $key => $value) {
            $option = newOption();
            $vote->optionList[$key] = $value;
            if (!($option->label = $value)) {
                $errorList["option-$key"] = true;
            }
        }
    }
    header("HTTP/1.1 200 OK");
    header("Content-Type: text/html; charset=utf-8");
    include __DIR__ . '/../../templates/vote/create.html.php';
}
