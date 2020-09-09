<?php

function newOption(): stdClass
{
    $option = new stdClass();
    $option->id = 0;
    $option->label = "";
    $option->voters = 0;
    return $option;
}
