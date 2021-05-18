# 🎓  TP - PHP Web

**Vous allez être évalués sur votre capacité à atteindre les objectifs fonctionnels 📝 suivants.**

Vous pouvez utiliser les `variables`, `conditionnelles`, `boucles`, `fonctions`, `super globales`, `hachage`, `accès fichier` dans une structure de projet avec routage et séparation vue/controlleur sur une thématique que vous avez choisis.

### 🐥 Précédement

Vous avez travaillé sur une création de comptes et une authentification avec le paradigme impératif et fonctionnels avant de conclure sur la thématique des sessions.

### 🦆 Maintenant

Vous allez procéder à de la logique sur les sessions et atteindre un objectif fonctionnel.

___

## 👨🏻‍💻 Jouons avec les sessions

### Rappel

Les sessions permettent de faire persister des informations entre plusieurs pages. L'information doit être stockée dans `$_SESSION` qui n'est disponible qu'après avoir démarré une session.

```php
session_start();
```

L'exemple suivant montre une information qui persiste sur plusieurs requêtes utilisateur.

```php
if (!array_key_exists("count", $_SESSION)) {
    $_SESSION["count"] = 0;
}

$_SESSION["count"] += 1;

echo $_SESSION["count"];
```

### Navigation

* 📝 `"/signin"`: quand l'utilisateur renseigne un `email` et un `mot de passe` valide vous devez stocker l'utilisateur dans la session pour l'index `"user"`.

* 📝 Quand il y a un utilisateur dans la session, la barre de navigation doit proposer un lien vers `"/logout"`

* 📝 Quand il n'y a pas d' utilisateur dans la session, la barre de navigation doit proposer un lien vers `"/signup"` et `"/signin"`

* 📝 `"/signin"`: quand il y a déjà un utilisateur dans la session vous devez `rediriger` immédiatement à l'adresse `"/"`.

* 📝 `"/signup"`: quand il y a déjà un utilisateur dans la session vous devez `rediriger` immédiatement à l'adresse `"/"`.

* 📝 `"/home"`: quand il n'y a pas d'utilisateur dans la session vous devez `rediriger` immédiatement à l'adresse `"/signin"`.

* 📝 `"/logout"`: cette adresse doit être associée à un controller qui possède une fonction `"logout"` dont la responsabilité est de détruire la session puis de rediriger vers `"/"`.

@start: https://www.php.net/manual/fr/function.session-start.php

@stop: https://www.php.net/manual/fr/function.session-destroy.php

___

## 👨🏻‍💻 Création/Lecture/Supression de favoris

### Rappel

Avec `filter_input` vous pouvez récupérer les informations des super globales, donc les informations provenant d'un formulaire en fonction de sa méthode en faisant référence à l'index de la super globale qui correspond à la valeur de l'attribut name d'un élément de formulaire.

```html
<form method="post" action="">
    <input name="foo">
    <button>Submit</button>
</form>
```

```php
$foo = filter_input(INPUT_POST, "foo")
```

### Création

* 📝 `"/"`: Vous devez proposer un formulaire avec un input dont l'attribut name vaut `"favorite"`.

* 📝 `"/"`: Quand l'input name est envoyé et qu'il ne correspond pas à une URL vous devez `afficher une erreur` pour indiquer que le format attendu est une URL.

* 📝 `"/"`: Quand le formulaire est envoyé et qu'il correspond à une URL vous devez l'`ajouter` à la liste des favoris de l'utilisateur puis `sauvegarder` ses informations avant de regiriger vers `"/"`.

### Lecture

* 📝 `"/"`: Vous devez afficher la liste des favoris sous forme de liens dont la valeur textuelle correspond à l'url du lien.


### Suppression

* 📝 `"/"`: Quand l'utilisateur survol un favoris vous devez afficher pour le favoris concerné grace au CSS un lien qui affiche une icone de corbeille.

* 📝 Chaque lien qui possède une icone de corbeille doit permettre de supprimer le favoris. Le href de ce lien doit inclure l'url du favoris en utilisant les paramètres d'URL, exemple: `"/?favorite=https://google.com"`

* 📝 `"/?favorite=https://google.com"`: Quand l'URL d'un favoris est présent en paramètre d'URL, le favoris associé doit être supprimé de la liste des favoris de l'utilisateur puis ses informations doivent être sauvegardées avant de le rediriger vers `"/"`.

___

## 🐱 Next

> Il est temps d'aller plus loin pour compléter nos objectifs fonctionnels.

### Création

* 📝 Quand vous sauvegardez un lien, vous dever récupérer l'URL de la `favicon` du site ciblé par l'URL du favoris et l'ajouter à l'index `"favicon"` du favoris.

* 📝 Quand vous sauvegardez un lien, vous dever récupérer le `"title"` de la page ciblée par l'URL du favoris et l'ajouter à l'index `"text"` du favoris.

### Lecture

Vous devez fournir un affichage préférentiel pour les favoris provenant de youtube.

* 📝 En plus de l'affichage de la liste de favoris, pour chaque favoris dont l'URL correspond à une vidéo youtube, vous devez proposer une vidéo embarquée qui correspond à celle ciblée par le favoris.

___

## 🕕 Gérez votre temps