<?php

$user = "John";

// Comparaison d'égalité stricte
if ($user === "Bryan") {
    echo "Hello Bryan, ou est John?";
}

// Comparaison d'inégalité stricte
if ($user !== "Bryan") {
    echo "Hello tu as vu Bryan?";
}

// SI ma condition vaut vraie
    // mon code est exécuté
// SINON
    // un autre code est exécuté



    $user = "John";

    // SI
    if ($user === "Bryan") {
        echo "Hello Bryan, ou est John?";
    // SINON SI
    } elseif ($user === "John") {
        echo "Hello John";
    // SINON
    } else {
        echo "Hello tu as vu Bryan?";
    }