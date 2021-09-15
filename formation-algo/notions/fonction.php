<?php

// Récupère mes étudiants
    // Récupération du contenu du fichier "students.txt"
    // Transformation de format
$studentList = unserialize(@file_get_contents("students.txt"));

// Vérifier que si le contenu n'existe pas
if ($studentList === false) {
    // Affectation d'une valeur d'initialisation
    $studentList = [];
}

// Je déclare un étudiant
$student = ["John", "Student"];
// J'ajoute l'étudiant créé à lal iste des étudiants
$studentList[] = $student;

// Je sauvegarde la liste des étudiants
    // Sauvegarde du contenu dans le fichier "students.txt"
    // Transformation de format
file_put_contents("students.txt", serialize($studentList));

echo "J'ai " . count($studentList) . " students";























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