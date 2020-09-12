<?php

function newVote(): stdClass
{
    $vote = new stdClass();
    $vote->id = 0;
    $vote->question = "";
    $vote->expiration = time() + 86400;
    $vote->optionList = [];
    return $vote;
}
