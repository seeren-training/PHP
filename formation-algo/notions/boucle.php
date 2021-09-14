<?php

$action = [
    "foo",
    "bar",
    "baz",
    "qux",
];

echo $action[2];


// Exploitation d'un tableau de manière répétitive
for($i = 0; $i < count($action); $i++) {
    echo $action[$i];
}
