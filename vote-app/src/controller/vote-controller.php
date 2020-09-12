<?php

function create(): void
{
    require __DIR__ . "/../service/entity/vote-service.php";
    require __DIR__ . "/../form/vote-form.php";
    require_once __DIR__ . "/../entity/vote.php";
    $vote = newVote();
    $errorList = handleRequest($vote);
    if (isSubmitted() && !$errorList && !($errorList = insertVote($vote))) {
        header("Location: /votes");
        exit();
    }
    header("HTTP/1.1 200 OK");
    header("Content-Type: text/html; charset=utf-8");
    require __DIR__ . '/../../templates/vote/create.html.php';
}

function showAll(): void
{
    require __DIR__ . "/../service/entity/vote-service.php";
    $voteList = findAllVote();
    header("HTTP/1.1 200 OK");
    header("Content-Type: text/html; charset=utf-8");
    require __DIR__ . '/../../templates/vote/show-all.html.php';
}

function show(int $id): void
{
    require __DIR__ . "/../service/entity/vote-service.php";
    $vote = findVote($id);
    header("HTTP/1.1 200 OK");
    header("Content-Type: text/html; charset=utf-8");
    require __DIR__ . '/../../templates/vote/show.html.php';
}
