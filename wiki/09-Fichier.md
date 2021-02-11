# Fichiers

*  🔖 **JSON**
*  🔖 **Sérialisation**
*  🔖 **Écriture**
*  🔖 **Lecture**

> Notre objectif sur ce chapitre est de savoir comment stocker dans des fichiers sur deux formats.
___

## 📑 [JSON](https://fr.wikipedia.org/wiki/JavaScript_Object_Notation)

La notation objet de JavaScript est le format d'inter échanges le plus utilisé. Ce n'est pas pour autant que c'est le bon forat pour du stockage local dans des fichiers "plats". Néanmoins dotons nous de cette capacité syntaxique.

Avant de stocker vos données vous devez les convertir et pourquoi pas en JSON.

### 🏷️ **[json_encode](https://www.php.net/manual/fr/function.json-encode.php)**

Pour convertir un tableau ou un objet en chaine de caractère JSON valide il faut utiliser `json_encode`.

```php
$json = json_encode($data);
```

### 🏷️ **[json_decode](https://www.php.net/manual/fr/function.json-decode.php)**

Pour convertir une chaine de caractère au format json en tableau ou objet il faut utiliser `json_decode`.

```php
$data = json_decode($json);
```

En effet quand voous allez récupérer une donnée dans un fichier, vous voulez surement l'utiliser dans votre programme.

___

## 📑 Sérialisation

La sérialisation consiste à obtenir une représentation au format chaine de caractère d'une valeur, pas particulièrement un tableau ou un objet.

### 🏷️ **[serialize](https://www.php.net/manual/fr/function.serialize.php)**

Génère une représentation stockable d'une valeur. C'est une technique pratique pour stocker ou passer des valeurs PHP entre scripts, sans perdre leur structure ni leur type.

```php
$serialized = json_encode($data);
```

### 🏷️ **[unserialize](https://www.php.net/manual/fr/function.unserialize.php)**

Crée une variable PHP à partir d'une valeur sérialisée.

```php
$data = json_encode($serialized);
```
___

## 📑 Écriture

Il existe de nombreuses fonctions pour écrire dans un fichier. Nous allons regardez les plus directe car le stockage en fichier ne devrait concerner que le cache. Nous stockerons nos fichiers dans le dossier `var/cache`.

### 🏷️ **[file_put_contents](https://www.php.net/manual/fr/function.file-put-contents.php)**

Écrit des données dans un fichier, si le fichier n'existe pas, il sera créé. Sinon, le fichier existant sera écrasé, si l'option FILE_APPEND n'est pas définie.

```php
$size = file_put_content("var/cache/my-file", $json);
```

> Cette fonction correspond à faire un `fopen`, `fwrite` et `fclose` consécutivement.

### 🏷️ **[Chemin](https://www.php.net/manual/fr/language.constants.predefined.php)**

Pour ne pas avoir de problèmes avec l'include_path ou la relativité des chemins, je vous conseil d’utiliser la constante magique `__DIR__`. Cette constante nous donne le chemin du répertoire en cours ou le script s’exécute.

```php
$includePath = __DIR__ . "/../var/cache/";
```

### 🏷️ **[Séparateur](https://www.php.net/manual/fr/dir.constants.php)**

Concernant les séparateurs, sur linux c'est le slash et sur window c'est l'antislash. Linux acceptera également l'antislash, si vous êtes jusqu’au-boutiste vous pouvez utiliser la constante `DIRECTORY_SEPARATOR` qui nous donne en fonction du système le caractère qui sert de séparateur.

```php
$includePath = __DIR__ 
    . DIRECTORY_SEPARATOR .".."
    . DIRECTORY_SEPARATOR . "var"
    . DIRECTORY_SEPARATOR . "cache"
    . DIRECTORY_SEPARATOR;
```

___

👨🏻‍💻 Manipulation

A la création ou mise à jour d'une donnée, sauvegarder la.

___

## 📑 Lecture

Nous allons regardez a fonction qui accompagne celle observée précédemment.

### 🏷️ **[file_get_contents](https://www.php.net/manual/fr/function.file-get-contents.php)**

Lit tout un fichier dans une chaîne.

```php
$json = file_get_content("var/cache/my-file");
```

Cependant si le fichier n'existe pas vous aurez un warning, regardons des fonctions pour vérifier qu'un fichier existe.

### 🏷️ **[is_file](https://www.php.net/manual/fr/function.is-file.php)**

Pour savoir si un fichier xiste et uniquement si c'est un fichier contrairement à `file_exists` il faut utiliser `is_file`.

```php
$bool = is_file($fileName);
```

### 🏷️ **Http**

La fonction `file_get_contents` permet également de faire ue requête http pour obtenir un flux distant. Il faut spécifier son argument include path à false et fournir un contexte avec `stream_context_create`.

#### **Contexte**

Le contexte permet de spécifier la méthode, les entêtes, le body et d'autres informations.

```php
$context = [
    "http" => [
        'method' => 'POST',
        'header'=> "Content-type: application/json\r\n"
                 . "Content-Length: " . strlen($data) . "\r\n",
        'content' => $data
    ]
];
```

#### **Réponse**

Pour obtenir les informations de réponse comme le status code et les entêtes, après avoir fait une requête avec `file_get_content`, une variable locale nommée $http_response_header sera disponible juste après fournissant les informations.

```php
$body = file_get_content($url, false, $context);
var_dump($http_response_header);
```

[HTTP Response Header](https://www.php.net/manual/fr/reserved.variables.httpresponseheader.php)

___

👨🏻‍💻 Manipulation

Lisez vos informations pour enrichir vos modèles. Effectuez les opérations d'écriture/lecture dans des services appropriés.
