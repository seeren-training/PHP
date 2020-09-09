<?php

function newVote(
    int $id,
    string $title,
    string $expiration,
    array $optionList,
    int $voters,
    bool $active): stdClass
{
    $vote = new stdClass();
    $vote->id = $id;
    $vote->title = $title;
    $vote->expiration = $expiration;
    $vote->optionList = $optionList;
    $vote->voters = $voters;
    $vote->active = $active;
    return $vote;
}
