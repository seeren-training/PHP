<?php

function showAll(): void
{
    header("HTTP/1.1 200 OK");
    header("Content-Type: text/html; charset=utf-8");
    $voteA = new stdClass();
    $voteA->title = "Vote A";
    $voteA->voters = 1235;
    $voteA->active = true;
    $voteB = new stdClass();
    $voteB->title = "Vote B";
    $voteB->voters = 235;
    $voteB->active = false;
    $voteC = new stdClass();
    $voteC->title = "Vote C";
    $voteC->voters = 235;
    $voteC->active = true;
    $voteList = [$voteA, $voteB, $voteC];
    include __DIR__ . '/../../templates/vote/vote-list.html.php';
}
