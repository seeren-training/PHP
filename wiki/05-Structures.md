# Structures

*  🔖 **Opérateurs**
*  🔖 **Conditions**
*  🔖 **Exception**
*  🔖 **Itérations**
*  🔖 **Fonctions**

> Cette fiche est importante, vous devrez souvent revenir à cette référence.

___

## 📑 Opérateurs

### 🏷️ **Arithmétiques**

Les opérateurs arithmétiques effectuent une opération entre deux opérandes.

|Opération|Syntaxe|Exemple|
|---|---|---|
|Addition|+|a = a + x|
|Soustraction|-|a = a - x|
|Multiplication|*|a = a * x|
|Division|/|a = a / x|
|Modulo|%|a = a % x|
|Incrément préfixé|++|++a|
|Incrément suffixé|++|a++|
|Décrément préfixé|--|--a|
|Décrément suffixé|--|a--|

#### **Incrément**

La chaine de caractères ne sera pas incrémentée dans l'ordre de valeur Unicode.

### 🏷️ **Affectation**

Les opérateurs d'affectation affectent une valeur après avoir effectué un calcul, ils simplifient l'écriture d'opérations. Ils réunissent l'opérateur = et les opérateurs arithmétiques, les opérateurs binaires peuvent aussi êtres simplifiés par un opérateur d'affectation mais nous les aborderons plus tard.

|Opération|Syntaxe|Exemple|
|---|---|---|
|Affectation|=|a = x|
|Addition puis affectation|+=|a += x|
|Soustraction puis affectation|-=|a -= x|
|Multiplication puis affectation|*=|a *= x|
|Division puis affectation|/=|a /= x|
|Modulo puis affectation|%=|a %= x|

#### **Conversion**

Pendant une opération si les valeurs ne correspondent pas au type attendu un warning sera déclenché.

### 🏷️ **Comparaison**

Les opérateurs de comparaison effectuent une comparaison portant sur la valeur ou sur le type et la valeur, soit une comparaison stricte. Ils renvoient un boolean, true si les éléments sont égaux pour la comparaison ou false s'ils ne le sont pas.

|Opération|Syntaxe|Exemple|
|---|---|---|
|Supérieur|>|a > x|
|Supérieur ou égal|>=|a >= x|
|Inférieur|<|a < x|
|Inférieur ou égal|<=|a <= x|
|Égalité|==|a == x|
|Égalité Stricte|===|a === x|
|Inégalité|!=|a != x|
|Inégalité stricte|!==|a !== x|

#### Égalité

Pour comparer une égalité non stricte, les valeurs seront converties. Un type peut être égal à un autre type si sa valeur convertie lui est égale. False peut être égal à une chaine vide, à une chaine qui contient 0, au nombre 0 ou à un tableau vide.

### 🏷️ **Logiques**

Les opérateurs logiques renvoient uniquement des valeurs booléennes.

#### **Et**

L'opérateur `&&` renvoie true si ses deux opérandes valent true.

```php
var_dump(true && true);
```

#### **Ou**

L'opérateur `||` renvoie true si une de ses opérandes vaut true.

```php
var_dump(true || false);
```

#### **Négation**

L'opérateur `!` renvoie true si son opérande peut être convertie à false, sinon il renvoie false.

```php
var_dump(!false);
```

### 🏷️ **Concaténation**

L'opérateur de concaténation est le point...

```php
$name = "John";
"Hello " . $name
```
___

## 📑 Conditions

Le flux d'instructions peut être encapsulé dans des blocs qui s’exécutent si certaines conditions sont remplies. Les structures conditionnelles contrôlent les flux d'instructions et mettent en place la logique, l’algorithmique du programme.

### 🏷️ **if else**

La structure if vérifie une condition dans ses parenthèses puis exécute les instructions dans le bloc délimité par ses accolades si la condition vaut true.

> Si la condition vaut false le code ne sera pas exécuté. Dans le cas d’absence d'opérateurs, les valeurs chaine de caractères vide, 0, false, et null sont équivalentes à false.

```php
if (true == 1) {
    echo 'true';
}
```

La structure if possède une clause else qui est optionnelle. Le bloc délimité par else sera exécuté dans le cas où la condition précédente ne vaut pas true.

```php
if (true === 1) {
} else {
    echo 'true';
}
```

La clause else peut aussi posséder une condition pour que son bloc soit exécuté et ainsi continuer de tester différentes conditions pour contrôler le flux d'instructions plus précisément.

```php
if (true === 1) {
} else if (true == '1') {
    echo 'true';
} else {
}
```

### 🏷️ **Ternaire**

L'opérateur ternaire est pratique pour vérifier une condition avant affectation mais pour ce faire il utilise trois opérandes. Le ? interroge la première opérande, si sa valeur peut être convertie à true alors la seconde opérande sera utilisée, sinon ce sera la troisième opérande.

```php
$foo = $operande1 ? $operande2 : $operande3;
```

### 🏷️ **switch**

La structure switch n'évalue pas une condition mais la valeur de retour d'une expression afin d'exécuter les instructions suivant l'étiquette correspondant à son égalité stricte.

```php
switch (2 + 3) {
    case 10:
        echo 10;
        break;
    default:
        echo 'default';
}
```

___

👨🏻‍💻 Manipulation

Utilisez la structure conditionnelle dans votre affichage.

___

## 📑 Exception

### 🏷️ **try catch**

L'instruction try catch est composée de deux blocs. Le premier bloc essaie d'exécuter une série d'instructions, si une exception est levée alors les instructions suivantes de ce bloc ne seront pas exécutées. Le bloc catch attrape l'exception dans son unique argument avant de le transmettre à son bloc contenant lui aussi des instructions destinées à traiter l'exception.

```php
try {
    echo 'try';
} catch (Throwable $e) {
    echo 'catch';
}
```

Si une erreur est levée dans le try, l'exécution continue dans le bloc du catch.

```php
try {
    new Foo();
    echo 'try';
} catch (Throwable $e) {
    echo 'catch'; // catch
}
```

Le bloc finally s'utilise pour exécuter des instructions après avoir essayé d'exécuter des instructions ou après avoir attrapé une erreur. Il est utile pour effectuer un traitement qu'il y ait eu des erreurs ou non.

```php
try {
    new Foo();
    echo 'try';
} catch (Throwable $e) {
    echo 'catch';
} finally {
    echo 'finally';
}
```

### 🏷️ **throw**

L'instruction throw lève un levable.

```php
throw new Exception(); 
```

Il est possible de créer ses propres exceptions pour pouvoir attraper plus finement un type précis dans le catch mais il en existe des prédéfinies.

🔗 [Exceptions](https://www.php.net/manual/fr/reserved.exceptions.php)

```php
try {
    throw new Error();
} catch (Error $e) {
    echo 'catch error';
} catch (Exception $e) {
    echo 'catch exception';
} finally {
    echo 'finally';
}
```

___

## 📑 Itérations

Une itération sert à répéter l'exécution d'instructions, pour parcourir un tableau ou un objet en peu de lignes il existe des structures itératives.

### 🏷️ **for**

* for ([initiale]; [condition]; [increment]) [{}]

La boucle for s'appuie sur une expression initiale, une condition et une expression d'incrément pour effectuer une itération. Les expressions et la condition sont optionnelles, mais sans elles il faudra vérifier la condition d'itération à l'intérieur du bloc d'instruction.

```php
for ($i = 0; $i < 5; $i++) {
    echo $i; // 0 1 2 3 4
}
```

### 🏷️ **foreach**

* foreach ($array as $value) {}

La boucle foreach peut itérer tous les objets itérables selon leurs mécanismes d'itération. Il parcourt la première opérande sur la valeur de ses propriétés ou de ses éléments qu'il affecte à la seconde opérande.

```php
$array = ["John", "Bryan"];
foreach ($array as $value) {
    echo $value; // John, Bryan
}
```

* foreach ($array as $key => $value) {}

Il est possible de demande l'indice du tableau ou le nom de la propriété de l'objet en cours d'itération

```php
$array = ["John", "Bryan"];
foreach ($array as $key => $value) {
    echo $key . $value; // 0John, 1Bryan
}
```

___

👨🏻‍💻 Manipulation

Utilisez la structure itérative dans votre affichage.

___

### 🏷️ **Contrôle de l'itération**

#### **break**

L'instruction break permet d’arrêter l'exécution d'une boucle.

```php
for ($i = 0; $i < 5; $i++) {
    if ($i === 3) {
        break;
    }
    echo $i; // 0, 1, 2
}
```

#### **continue**

L'instruction continue permet d’arrêter l'itération en cours d'une boucle.

```php
for ($i = 0; $ii < 5; $i++) {
    if ($i === 3) {
        continue;
    }
    echo $i; // 0, 1, 2, 4
}
```

___

## 📑 Fonctions

Les fonctions sont des objets Function qui permettent d'encapsuler des instructions dans un bloc afin d'y faire appel. Les fonctions peuvent posséder des arguments afin de leur transmettre des valeurs et peuvent également retourner une valeur de fin d'instruction.

### 🏷️ **Déclaration**

Une fonction peut être une expression ou une instruction, dans les deux cas elles sont un objet Function.

* function identifiant([param1[, param2[, ...,paramN]]]) {}

```php
function maFonction()
{
    echo "Hello";
}
```

#### **return**

* return [expression = null]; 

L'instruction return renvoie la valeur de l'expression qui lui succède et met fin à l'exécution des instructions d'une fonction. L'expression de retour est optionnelle et sa valeur par défaut est null.

```php
function maFontion()
{
    return true;
}

echo maFontion(); // true
```

#### **Les arguments**

La signature d'une fonction peut comporter des arguments ou paramètres, ce sont des valeurs ou des objets qui seront transmis sous forme de variables locales à la fonction. Les objets sont passés par référence ce qui signifie qu'ils ne sont pas copiés et que leurs modifications au sein de la fonction impactent l'objet en dehors de la fonction.

Il est possible de déclarer plusieurs arguments dans la signature d'une fonction.

```php
function division($dividende, $diviseur)
{
    return $dividende / $diviseur;
}
echo division(10, 2); // 5
```

Les arguments peuvent être optionnels en leur affectant une valeur dans la signature.

```php
function division($dividende, $diviseur = 1)
{
    return $dividende / $diviseur;
} 
```

#### **Typage**

Depuis PHP7 il est possible de typer en primitif et en non primitif les arguments et la valeur de retour de la fonction.

```php
function division(float $dividende, float $diviseur = 1): float
{
    return $dividende / $diviseur;
} 
```

Si vous fournissez le mauvais type la valeur sera convertie si c'est possible.


#### **Portée**

Une variable déclarée dans une fonction est locale: elle n'est pas disponible en dehors de la fonction. Pour qu'une fonction utilise une variable déclarée localement, il faut utiliser le mot `global`.

```php
$message = "Hello";

function helloWorld(): string
{
    global $message;
    return "$message World";
}

echo helloWorld(); // Hello World
```
___

👨🏻‍💻 Manipulation

Vous devez afficher une page web en utilisant une fonction d'un controller, qui associe le model et la vue.

* Controllers

Un controller a la responsabilité de fournir une réponse HTTP pour une thématique comme product, member etc. Créez un fichier dans le dossier `controller` et fournissez une fonction fournissant une réponse, elle doit être appelée dans le point d'entré de l'application.

* Entity

Une entité ou un modèle représente une structure d'information et rien d'autre. Cette information sera formatée en affichage dans un template. Créez un ou plusieurs fichiers dans le dossier `entity` et fournissez une fonction créant un exemplaire de la structure d'information concernée, elle doit être appelée dans le controller.

* Templates

Un template ou une vue a la responsabilité de formater de la donnée dans un format d'affichage, HTML par exemple. Chaque fonction d'un controller possède son template, créez alors pour le controller un dossier portant son nom avec un fichier de template correspondant au nom de sa fonction.
