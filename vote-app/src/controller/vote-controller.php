<?php

function showAll(): void
{
    include "./../src/entity/vote.php";
    $voteList = [
        newVote("NobleChairs vs Titan", 234, true),
        newVote("Razer vs Dell", 654, true),
        newVote("Linux vs Window", 2234, true)
    ];
    header("HTTP/1.1 200 OK");
    header("Content-Type: text/html; charset=utf-8");
    include __DIR__ . '/../../templates/vote/show-all.html.php';
}
