<?php



$data = "Hello World";

// Ecrire dans un fichier existant ou non
// Si le fichier n'existe pas il sera créé
file_put_contents("formation-algo/mon-fichier.txt", $data);


// Lire un fichier
// Si le fichier n'existe pas il y a un Warning
// Le @ désactive l'affichage des erreurs sur une instruction
$contents = @file_get_contents("formation-algo/mon-fichisfsrgdsrgdrger.txt");


echo $contents;




















// count est une fonction
// Une fonction porte un nom (un identifiant)
// Et porte des parenthèses d'execution
// Les parenthèses formulent une liste d'arguments

// $age = readline("Quel age avez vous?");

// echo $age;
// if ($age === "") {
//     echo "Veuillez saisir votre age";
// } else {
//     echo "Vous avez: $age";
// }