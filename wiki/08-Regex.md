# Regex

*  🔖 **Définition**
*  🔖 **Délimiteurs**
*  🔖 **Drapeaux**
*  🔖 **Limites**
*  🔖 **Ensemble de caractères**
*  🔖 **Classe de caractères**
*  🔖 **Quantificateurs**

___


## 📑 [Définition](https://www.php.net/manual/fr/reference.pcre.pattern.syntax.php)

Une expression rationnelle ou régulière représente un motif qui sera utilisé pour vérifier s'il correspond à des données que l'on souhaite comparer ou extraire.

![images](https://raw.githubusercontent.com/seeren-training/PHP/master/wiki/resources/regex.jpg)

### 🏷️ **[preg_match](https://www.php.net/manual/fr/function.preg-match.php)**

Effectue une recherche de correspondance avec une expression rationnelle standard.

```php
echo preg_match('/(foo)(bar)/', 'foobar', $matches); // 1
print_r($matches); //Array ( [0] => foobar [1] => foo [2] => bar )
```

### 🏷️ **[filters](https://www.php.net/manual/en/function.filter-var.php)**

filter_var ou filter_input peuvent valider une donnée en fonction d'une expression régulière.

```php
echo filter_var('foobar', FILTER_VALIDATE_REGEXP, [
    "options" => [
        "regexp" => '/(foo)(bar)/'
    ]
]); // foobar
```

Nous pouvons savoir si une chaine de caractère correspond au motif passé en premier argument et également extraire les motifs correspondants. Nous allons passez en revue la syntaxe des expressions régulières pour valider nos données entrantes.

___

## 📑 [Délimitateurs](https://www.php.net/manual/fr/regexp.reference.delimiters.php)

Lors de l'utilisation des fonctions PCRE, il est nécessaire que le motif soit encadré par des délimiteurs. Un délimiteur peut être n'importe quel caractère non alpha-numérique autre qu'un backslash ou qu'un espace. 

```php
$regex = "#foobar#";
```

___

## 📑 [Drapeaux](https://www.php.net/manual/fr/reference.pcre.pattern.modifiers.php)

Un drapeau est utile pour préciser comment la correspondance doit se faire entre le motif et les données.

|Correspondance|Flag|Syntaxe|
|--|--|--|
|Insensible à la casse|i|/motif/i|
|Recherche ligne par ligne|m|/motif/m|
|Le masque et la chaîne d'entrée sont traitées en UTF-8.|u|/motif/u|


```php
echo preg_match('#\x{0066}oo#u', 'foobar', $matches); // 1
```

___

## 📑 Limites

Un motif peut comporter des limites, pour marquer le début ou la fin d'une entrée par exemple.

|Correspondance|Limite|Syntaxe|
|--|--|--|
|Début de la chaine ou de la ligne selon le drapeau|^|/^motif/|
|Fin de la chaine ou de la ligne selon le drapeau|$|/motif$/|
|Largeur entre mots|\b|/\bmotif/|
|Largeur entre caractères|\B|/\Bmotif/|

```php
echo preg_match('#^foo#', 'foobar', $matches); // 1
```

```php
echo preg_match('#bar$#', 'foobar', $matches); // 1
```

```php
echo preg_match('#\bbar#', 'foo bar', $matches); // 1
```

```php
echo preg_match('#\Bbar#', 'foobar', $matches); // 1
```

___

## 📑 Ensemble de caractères

Les crochets regroupent un ensemble de caractères, des caractères ou des intervalles de caractères peuvent y figurer.

|Correspondance|Ensemble|Syntaxe|
|--|--|--|
|Un ensemble de caractères|[aeiou]|/[aeiou]/|
|Un ensemble de caractères|[a-z]|/[a-z]/|
|Un ensemble de caractères exclus|[^a-z]|/[^a-z]/|

```php
echo preg_match('#[aeiou]#', 'Hello', $matches); // 1
```

```php
echo preg_match('#[^A-Z]#', 'HELLO', $matches); // 1
```
___

## 📑 [Classe de caractères](https://www.php.net/manual/fr/regexp.reference.character-classes.php)

Afin de décrire des ensembles de caractères plus simplement, les classes de caractères représentent des ensembles de caractères.

|Correspondance|Classe|Syntaxe|
|--|--|--|
|Tous les caractères exceptés saut de ligne et retour chariot|.|/./|
|Caractères numériques|\d|/\d/|
|Caractères non numériques|\D|/\D/|
|Caractères alphabétiques et numériques|\w|/\w/|
|Caractères non alphabétiques et non numériques|\W|/\W/|
|Caractères blancs|\s|/\s/|
|Caractères non blancs|\S|/\S/|

```php
echo preg_match('#\d#', 'fo0', $matches); // 1
```

___

## 📑 [Quantificateurs](https://www.php.net/manual/fr/regexp.reference.repetition.php)

Les quantificateurs permettent de quantifier des caractères dans un motif.

|Correspondance|Quantificateur|Syntaxe|
|--|--|--|
|Aucun ou plusieurs fois|*|/x*/|
|Une ou plusieurs fois|+|/x+/|
|Aucune ou une fois|?|/x?/|
|S'il est précédé par y|(?=)|/x(?=y)/|
|S'il n'est pas précédé par y|(?!)|/x(?!y)/|
|Correspond à n occurrences|{n}|/x{n}/|
|Correspond à n occurrences ou plus|{n,}|/x{n,}/|
|Correspond à un intervalle entre n et m occurrences|{n,m}|/x{n,m}/|

```php
echo preg_match('#(foo){2}#', 'foobar', $matches); // 0
```
___

👨🏻‍💻 Manipulation

Utilisez les expressions régulières pour valider le format de vos données entrantes dans le cadre d'un formulaire.
