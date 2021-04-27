<?php

$option = [
    "--name" => null,
    "--descr" => null,
    "--price" => null,
    "--unit" => null,
];
$key = null;
foreach ($argv as $value) {
    if (array_key_exists($value, $option)) {
        $key = $value;
    } elseif ($key) {
        $option[$key] = $option[$key] . $value . " ";
    }
}
if (null === $key) {
    echo "Aucune option detectée\n";
} else {
    $error = null;
    foreach($option as $key => $value) {
        if (null === $value) {
           $error = "L'option $key est manquante\n";
        }
    }
    if (null !== $error) {
        echo $error;
    } else {
        echo "Le produit a été créé: \n";
        echo $option["--name"] . "\n";
        echo $option["--descr"] . "\n";
        echo $option["--price"] . "\n";
        echo $option["--unit"] . "\n";
    }
}



