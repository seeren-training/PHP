<?php

function newVote(): stdClass
{
    $vote = new stdClass();
    $vote->id = 0;
    $vote->question = "";
    $vote->expiration = 0;
    $vote->optionList = [];
    return $vote;
}
