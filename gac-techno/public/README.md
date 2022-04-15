


# Manipulation

Validons la théorie par la pratique!

___

## Manipulation 1: L'inclusion

**PB**: la maintenance de mes barres de navigation est lourde

**Solution**: faire de la réutilisation en utilisant include sur les différentes pages de mon projet.

*Inclure un fichier*

```php
<?php 

include __DIR__ . '/monfichier.php';

?>
```


* Isoler la barre de navigation
* Choisir un nom et un emplacement de fichier
* Inclure le fichier
* Faire la même choses pour les autres pages
    * Renommer l'extension des autres pages pour que php soir interprété!

___

## Manipulation 2: L'affichage

**PB**: les éléments communs sont statiques et le titre doit pourtant évoluer

*Afficher avec le 'short tag'*

```php
<h1><?= $maVariable ?></h1>
```

**Solution**: afficher dans le titre une variable  qui permet à chaque page d'avoir son titre
* Ticket Manager
* Ticket List
* New Ticket
* Ticket


___

## Manipulation 3: Les conditons

**PB**: les éléments du menu n'évoluent pas en fonction de la page sur laquelle je suis

*En php classique*

```php
 if ($condition) {
     //
 }
```

*En php mélangé avec de l'HTML*

```php
<?php if ($condition) { ?>
//
<?php } ?>
```

*Mettre en surbrillance un lien*

```html
 <a class="nav-link active" ... 
```


**Solution**: ajouter la class 'active' sur les liens de navigation du menu sous condition

> Tips: Si ma variable de titre vaut strictement 'Ticket List' alors j'affiche 'active'


___

## Manipulation 4: L'itération

**PB**: l'affichage des tickets est statique

*Déclarer un tableau*

```php
$myArray = [
    'mon index' => 'Ma valeur',
];
```

*Accéder à un élément*

```php
echo $myArray['mon index'];
```

*Parcourir un tableau*

```php
foreach ($myArray as $index => $someVar) {
    //...
}
```

**Solution**: afficher autant de ticket qu'il y a d'éléments dans le tableau `$ticketList`

```php
$ticketList = [
    [
        'label' => 'Issue',
        'description' => 'An item',
    ],
    [
        'label' => 'Risky',
        'description' => 'An second item',
    ],
    [
        'label' => 'Normal',
        'description' => 'An third item',
    ],
    [
        'label' => 'Issue',
        'description' => 'An fourth item',
    ],
];
```


___

## Manipulation 5: Les fichiers

**PB**: les tickets ne sont pas sur un espace de stockage mutualisé

*Sauvegarder de la données*

```php
// Transformer le format pour qu'il soit stockable
$serialization = serialize($foo);

// Ecrire dans un fichier
file_put_contents($path, $serialization);
```

*Récupérer de la données*

```php
// Lire dans un fichier
$fileContent = file_get_contents($path);

// Transforme en variable un string qui résulte d'une sérialization
$initialValue = unserialize($fileContent);

```

**Solution**: récupérer les tickets du fichier ou ils sont stockés pour les afficher comme précédement

> Le fichier se trouve à l'adresse suivante: https://github.com/seeren-training/PHP/blob/master/gac-techno/includes/data/tickets.serialize. Je vous invite dans le dossier include a créer un dossier 'data' qui contient le fichiers 'tickets.serialize'.