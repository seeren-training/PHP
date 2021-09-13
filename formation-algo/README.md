# PHP - Algorithmique

## Durée

28 heures

---

## 👴 Scénario

*Je m'occupe de la gestion du stock pour un revendeur de matériel informatique et franchement, c'est le bazar. Nous maintenons l'état du stock sur papier et depuis la dernière inondation, on a compris qu'il y avait une autre solution à trouver...*

J'aimerais pouvoir piloter mon stock informatiquement ! Pour un revendeur informatique, je mérite bien ça non ?

Par contre, je suis un vieux de la vieille, pas question de commander un site internet, je veux du fonctionnel et sans fioriture alors j'aimerai bien un outil qui se limite à la ligne de commande depuis un terminale... Dans un premier temps.

*J'ai parlé un peu avec des techo's et je vous décris l'outil de nos rêves.*

___

## 📦 Utilisation

Il faudrai que depuis un terminale je puisse saisir la commande suivante à la racine du dossier `gestion-de-stock`:

```bash
php bin/stock
```

Le terminal doit m'afficher les informations suivantes:

```bash
Gestion de stock.

Voiçi la liste des commandes disponibles:

- creer
- supprimer
- modifier
- lister
```

Donc dans l'idée je dois pouvoir utiliser une de ces options en la précisant de la façon suivantes.

```bash
php bin/stock creer
```

Si jamais je précise une option qui n'existe pas, le terminal doit m'en informer.

```bash
php bin/stock manger
```

```
Gestion de stock.

L'option "manger" n'existe pas:

- Exécutez l'outil sans arguments pour connaitre la liste des options disponibles.
```

___

## 📦 Création d'un produit

Il faut que l'on puisse enregistrer un nouveau produit, avec un nom, un prix et le stock. 

* Ligne de commande

```bash
php bin/stock creer
```

Le terminal doit me permettre de saisir une information de la façon suivante:

```
Gestion de stock.

Création d'un nouveau produit:

> Nom du produit:
```

Si le nom du produit n'est pas saisie il m'informe qu'il y a une erreur:

```
Erreur: 

- Le "nom" du produit n'est pas valide.
```

Sinon il me pose la question suivante:

```bash
> Prix du produit:
```

Si le produit ne correspond pas à un nombre supérieur à 0 il m'informe qu'il y a une erreur:

```
Erreur: 

- Le "prix" du produit n'est pas valide.
```

Sinon il me pose la question suivante:

```bash
> Stock du produit:
```

Si le stock du produit n'est pas saisie il m'informe qu'il y a une erreur: 

```
Erreur: 

- Le "stock" du produit n'est pas valide.
```

Sinon il me confirme que le produit est enregistré et propose un récapitulatif.

* Résultat

```bash
Le produit a bien été enregistré:
- nom: Azus M4A1
- prix: 14000
- stock: 3
```

Le produits doivent être stockés dans un fichier `produits.txt`. Le fichier contient l'ensemble des produits qui ont été créés.

Si l'on tente de créer un produit qui existe déjà, l'outil nous en informe et arrête son exécution.

```
Erreur: 

- Le produit "Azus M4A1" existe déjà.
```

___

## 📦 Suppression d'un produit

On souhaite pouvoir supprimmer un produit en utilisant son nom.

* Ligne de commande

```bash
php bin/stock supprimer Azus M4A1
```

Si l'on rentre un nom de produit existant, l'outil nous informe que la suppression est effectuée:

* Résultat

```
Gestion de stock.

Supression d'un produit:

- Le produit "Azus M4A1" a bien été supprimé.
```

Si le nom du produit ne correspond à aucun produit, l'outil doit nous en informer:

```
Gestion de stock.

Erreur: 

- Le produit "Azus M4A1" n'existe pas.
```

___

## 📦 Modification d'un produit

On souhaite pouvoir modifier le nombre d'unité disponible en stock.

* Ligne de commande

```bash
php bin/stock modifier Azus M4A1
```

Si l'on rentre un nom de produit existant, l'outil nous pose la question suivante:

```
Gestion de stock.

Modification d'un produit:

> Stock du produit:
```

Si le stock du produit n'est pas saisie il m'informe qu'il y a une erreur: 

```
Erreur: 

- Le "stock" du produit n'est pas valide.
```

Sinon il confirme que la modification a été effectuée.

```
Le produit "Azus M4A1" a bien été mis à jour:
- stock: 6
```

___

## 📦 Lecture des produits

On souhaite pouvoir visualiser l'ensemble des produits enregistrés.

```bash
php bin/stock lister
```

```
Gestion de stock.

Liste des produit:

-------------------------------
|     Name    | Price  | Unit  |
-------------------------------
| Azus M4A1   | 14000  | 3     |
-------------------------------
| Azus M4A200 | 140000 | 30000 |
-------------------------------
```

Si tout cela fonctionne je ne pourai plus perdre l'inventaire des produits à chaque inondation, ce serai top!

___

## 📝 Support de cours

Vous aurez besoin d'envie, de recherche personelle et des notions suivantes:

* Exécuter PHP: https://github.com/seeren-training/PHP/wiki/02#-exécution
* Les variables: https://github.com/seeren-training/PHP/wiki/04#-déclarations
* Les types: https://github.com/seeren-training/PHP/wiki/04#-types
* Les tableaux: https://github.com/seeren-training/PHP/wiki/04#-tableaux
* Les opérateurs: https://github.com/seeren-training/PHP/wiki/05#-opérateurs
* Les conditions: https://github.com/seeren-training/PHP/wiki/05#-conditions
* Les boucles: https://github.com/seeren-training/PHP/wiki/05#-itérations
* Les fonctions: https://github.com/seeren-training/PHP/wiki/05#-fonctions
* L'écriture: https://github.com/seeren-training/PHP/wiki/09#-Écriture
* La lecture: https://github.com/seeren-training/PHP/wiki/09#-lecture
