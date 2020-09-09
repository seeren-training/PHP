<?php

function showAll(): void
{
    include "./../src/entity/vote.php";
    $voteList = [
//        newVote(1, "NobleChairs vs Titan", 234, true),
//        newVote(2, "Razer vs Dell", 654, false),
//        newVote(3, "Linux vs Window", 2234, true)
    ];
    header("HTTP/1.1 200 OK");
    header("Content-Type: text/html; charset=utf-8");
    include __DIR__ . '/../../templates/vote/show-all.html.php';
}

function show(int $id): void
{
    include "./../src/entity/vote.php";
    $voteList = [
//        newVote(1, "NobleChairs vs Titan", 234, true),
//        newVote(2, "Razer vs Dell", 654, false),
//        newVote(3, "Linux vs Window", 2234, true)
    ];
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
    include "./../src/entity/vote.php";
    $errorList = [];
    $vote = newVote(0, "", "", ["Option 1", "Option 2"], 0, true);
    if (null !== filter_input(INPUT_POST, "vote-form")) {
        $vote->title = filter_input(INPUT_POST, "title");
        $vote->expiration = filter_input(INPUT_POST, "expiration");
        $vote->optionList = filter_input_array(INPUT_POST)["options"];
        if (!$vote->title) {
            $errorList["title"] = true;
        }
        if (!$vote->expiration || time() > strtotime($vote->expiration)) {
            $errorList["expiration"] = true;
        }
        foreach ($vote->optionList as $key => $option) {
            if (!$option) {
                $errorList["option-$key"] = true;
            }
        }
    }
    header("HTTP/1.1 200 OK");
    header("Content-Type: text/html; charset=utf-8");
    include __DIR__ . '/../../templates/vote/create.html.php';
}

























