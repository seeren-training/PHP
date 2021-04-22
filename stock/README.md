# PHP - Algorithmique

## Durée

28 heures

---

## 👴 Scénario

Je m'occupe de la gestion du stock pour un revendeur de matériel informatique et franchement, c'est le bazar. Nous maintenons l'état du stock sur papier et depuis la dernière inondation, on a compris qu'il y avait un effort à faire...

J'aimerais pouvoir piloter mon stock informatiquement ! Pour un revendeur informatique, je mérite bien ça non ?

Par contre, je suis un vieux de la vieille, pas question de commander un site internet, je veux du fonctionnel et sans chichi alors j'aimerai bien un outil qui se limite à la ligne de commande... Dans un premier temps.

J'ai parlé un peu avec des techo's et je vous décris l'outil de nos rêves.

___

## 📦 Création d'un produit

Il faut que l'on puisse enregistrer un nouveau produit, avec un nom, description, prix et le nombre d'exemplaires disponibles. 

* Ligne de commande

```bash
php stock.php --name Azus M4A1 --descr 17P 16G Antracite --price 14000 --unit 3
```

À chaque enregistrement, on souhaite qu'un identifiant numérique soit généré et on veut savoir si c'est bien enregistré!

* Résultat

```bash
The product 34 has been record:
- name: Azus M4A1
- description: 17P 16G Antracite
- price: 14000
- unit: 3
```

___

## 📦 Suppression d'un produit

On souhaite pouvoir carrement supprimmer un produit en utilisant son identifiant.

* Ligne de commande

```bash
php stock.php --delete 34
```

On veut savoir si ça a pas beugé!

* Résultat

```bash
The product 34 has been deleted
```

___

## 📦 Mise à jour d'un produit

On souhaite pouvoir modifier le nombre d'unité disponible en stock.

* Ligne de commande

```bash
php stock.php --update 34 --unit 6
```

On veut savoir si on s'est pas loupé.

* Résultat

```bash
The product 34 with 6 unit has been updated
```

___

## 📦 Lecture des produits

On souhaite pouvoir visualiser l'ensemble des produits enregistrés.

```bash
php stock.php --list
```

Vous allez vous amuser sur la mise en forme, faites attention à bien espacer propre à la verticale et à l'horizontale.

```bash
-----------------------------------------------------------
|  Id  |   Name   |       Description       | Price | Unit |
-----------------------------------------------------------
| 34   | Azus     | 17P 16G Antracite       | 14000 | 3    |
|      | M4A1     |                         |       |      |
-----------------------------------------------------------
```

Si tout cela fonctionne je pourai plus perdre l'inventaire des produits à chaque inondation, ce serai top!

___

## 📝 Support de cours

Vous aurez besoin des notions suivantes:

* Exécuter PHP: https://github.com/seeren-training/PHP/wiki/02#-exécution
* Les variables: https://github.com/seeren-training/PHP/wiki/04#-déclarations
* Les types: https://github.com/seeren-training/PHP/wiki/04#-types
* Les tableaux: https://github.com/seeren-training/PHP/wiki/04#-tableaux
* Les opérateurs: https://github.com/seeren-training/PHP/wiki/05#-opérateurs
* Les conditions: https://github.com/seeren-training/PHP/wiki/05#-conditions
* Les boucles: https://github.com/seeren-training/PHP/wiki/05#-itérations
* Les fonctions: https://github.com/seeren-training/PHP/wiki/05#-fonctions
* Le JSON: https://github.com/seeren-training/PHP/wiki/09#-json
* L'écriture: https://github.com/seeren-training/PHP/wiki/09#-Écriture
* La lecture: https://github.com/seeren-training/PHP/wiki/09#-lecture

Et de la recherche personelle!