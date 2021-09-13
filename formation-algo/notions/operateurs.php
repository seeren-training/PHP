<?php

$productPrice = 199;
$productQuantity = 2;
$productName = "Velo";
$productColor = "Rouge";

// La concatenation est l'addition de chaine de caractères
echo "Le produit $productName  est  $productColor";
echo 'Le produit ' . $productName . ' est ' . $productColor;

// Les opérateurs + - * / sont disponibles
echo $productQuantity . ' ' . $productName . ' coute: ' . $productPrice * $productQuantity;