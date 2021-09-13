<?php

$nombre = 3;

// if (1 !== $nombre) {
//     if (2 !== $nombre) {
//         echo "Le nombre ne vaut pas 1 et ne vaut pas 2";
//     }
// }

if (1 !== $nombre && 2 !== $nombre) {
    echo "Le nombre ne vaut pas 1 et ne vaut pas 2";
}

$action = "manger";

if ("manger" === $action || "dormir" === $action) {
    echo "Je ne suis pas en cours";
}
