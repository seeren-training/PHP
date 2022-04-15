<?php

$foo = [
    'first',
    'second'
];

$path = __DIR__ . '/test.txt';

// Transformer le format pour qu'il soit stockable
$serialization = serialize($foo);

// Ecrire dans un fichier
file_put_contents($path, $serialization);

// Lire dans un fichier
$fileContent = file_get_contents($path);

// Transforme en variable un string qui résulte d'une sérialization
$initialValue = unserialize($fileContent);


var_dump($initialValue);
