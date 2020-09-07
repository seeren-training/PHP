<?php

function newVote(
    int $id,
    string $title,
    int $voters,
    bool $active): stdClass
{
    $vote = new stdClass();
    $vote->id = $id;
    $vote->title = $title;
    $vote->voters = $voters;
    $vote->active = $active;
    return $vote;
}
