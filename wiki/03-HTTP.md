# HTTP

*  🔖 **Body**
*  🔖 **Headers**
*  🔖 **Status**

> Avec ce langage nous réagissons à une requête utilisateur en fournissant une réponse par le biais du protocole HTTP. Observons les éléments de réponses que nous pouvons apporter et leur syntaxe.

___

![image](https://raw.githubusercontent.com/seeren-training/PHP/master/wiki/resources/http.png)

## 📑 [Body](https://en.wikipedia.org/wiki/HTTP_message_body)

Le corps d'une réponse correspond au document délivré au navigateur web, au contenu affiché.

### 🏷️ **[echo](https://www.php.net/manual/fr/function.echo.php)**

La structure du langage `echo` affiche une chaine de caractère.

```php
<?php

echo "Hello";
```

Il dispose d'une version courte qui doit être utilisée quand vous mélangez php avec du contenu statique. En effet quand vous dynamisez du contenu comme de l'HTML il n'est pas pratique d'utiliser la syntaxe suivante.

```php
<h1>
<?php

echo "Hello";

?>
</h1>
```

Et vous devriez utiliser le tag court PHP qui affiche une chaine de caractère.

```php
<?= "Hello" ?>
```

### 🏷️ **[include](https://www.php.net/manual/fr/function.include.php)**

L'instruction de langage include inclut et exécute le fichier spécifié. Il ne possède pas de valeur de retour et en cas de fichier non trouvé il déclenche un warning.

Les variables sont disponibles dans le fichier inclut.

```php
include './../templates/home/home.php';
```

L'instruction du langage `require` est similaire mais il possède une valeur de retour et provoque une erreur fatale si le fichier n'est pas trouvé.

___

👨🏻‍💻 Manipulation

Utilisez include pour afficher une page html et echo au sein des fichiers inclut pour les valeurs qui seront dynamiques. Le fichier inclut doit également utiliser include pour ne pas répéter des éléments communs à toutes les futures pages web comme le header ou footer.

___

## 📑 [Headers](https://en.wikipedia.org/wiki/List_of_HTTP_header_fields#Response_fields)

Les entêtes d'une réponse correspond à des instructions qu le navigateur doit prendre en compte, par exemple pour stocker la réponse en cache, ou pour formater son corps.

### 🏷️ **[header](https://www.php.net/manual/fr/function.header.php)**

La fonction header permet de spécifier une entête. 

Pour formater un document en XML par exemple.

```php
header("Content-Type: application/xml")
```

Pour demander l'interprétation d'une image.

```php
header("Content-Type: image/png")
```

Pour formater un document en json par exemple.

```php
header("Content-Type: application/json")
```

Vous remarquez que par défaut le type de contenu est text/html, il peut se configurer dans le fichier `php.ini`.

#### **Redirection**

Pour demander une redirection au navigateur le header location dit être utilisé.

```php
header("Location: /some-url")
```
___

## 📑 [Status](https://developer.mozilla.org/fr/docs/Web/HTTP/Status)

Un code de status d'une réponse indique son état, son status. Il est composé d'un nombre et d'un texte associé normalisé.

Vous avez déjà rencontré des pages 404, ceci est un code de status. Il y a 5 catégories de code pour indiquer une information, un succès, une redirection, une erreur ou une erreur interne.

Pour définir le status d'une réponse en PHP il faut utiliser la fonction `header`, le protocole et sa version doivent être spécifiés. Vous remarquez que par défaut le status est 200 OK.

```php
header("HTTP/1.1 404 Not Found")
```

___

👨🏻‍💻 Manipulation

* Sans compter sur les valeurs par défaut, envoyez une entête et un status au client en utilisant la fonction header.

* Affichez une page web suivant votre thématique en utilisant include pour ne pas répéter à l'avenir certaines parties du document. Par rapport à l'organisation du projet réunissez les éléments d'affichage dans le dossier `templates`, c'est l'organisation de vos vues que vous découvrez.

* Utilisez dans vos fichiers 'echo' aux endroit où l'information sera dynamique.

___
