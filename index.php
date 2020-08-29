<?php

function foo () {
    static $bar = 0;
    return ++$bar;
}


echo foo(); // 1
echo foo(); // 2