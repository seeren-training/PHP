<?php

$age = 21;
$nom = 'Bryan';

// Les opérateurs

// comparaison non sticte
if (false == 0) {
}

// comparaison stricte
if (13 === $age) {
}

// inegalité non sticte
if ('John' != 'Bryan') {
}

// inegalité  sticte
if ('John' !== 'Bryan') {
}

// supérieur
if (13 > 12) {
}

// inférieur
if (12 < 13) {
}

// Opérateur logiques

// AND
if ($age > 18 && $nom === 'Bryan') {
}

// OR
if ($age > 18 || $nom === 'Bryan') {
}
