<?php

function newVote(
    string $title,
    int $voters,
    bool $active): stdClass
{
    $vote = new stdClass();
    $vote->title = $title;
    $vote->voters = $voters;
    $vote->active = $active;
    return $vote;
}
