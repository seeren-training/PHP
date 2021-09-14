<?php

$productPrice = 199;
$productQuantity = 2;
$productName = "Velo";
$productColor = "Rouge";

echo "Le produit $productName  est  $productColor";
// La concatenation est l'addition de chaine de caractères
echo 'Le produit ' . $productName . ' est ' . $productColor;

// Les opérateurs arithmétiques sont disponibles
echo $productQuantity . ' ' . $productName . ' coute: ' . $productPrice * $productQuantity;