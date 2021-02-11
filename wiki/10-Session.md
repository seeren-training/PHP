# Sessions

*  🔖 **Définition**
*  🔖 **Start**
*  🔖 **Destroy**
*  🔖 **Configuration**

___

## 📑 [Définition](https://www.php.net/manual/fr/reserved.variables.session.php)

> Notre objectif sur ce chapitre est de comprendre le mécanisme des sessions.


 Les sessions sont un moyen simple de stocker des données individuelles pour chaque utilisateur en utilisant un identifiant de session unique. Elles peuvent être utilisées pour faire persister des informations entre plusieurs pages. Les identifiants de session sont normalement envoyés au navigateur via des cookies de session, et l'identifiant est utilisé pour récupérer les données existantes de la session. L'absence d'un identifiant ou d'un cookie de session indique à PHP de créer une nouvelle session, et génère ainsi un nouvel identifiant de session. 

![image](https://raw.githubusercontent.com/seeren-training/PHP/master/wiki/resources/session.gif)

### 🏷️ **Mécanisme**

En PHP il faudra démarrer la session, à ce moment il y a deux possibilités. 
* Si le client n'est jamais venu

PHP génère un identifiant de session unique pour le client et créé un fichier dans le dossier temporaire du serveur afin de stocker ses données. Les données que l'on voudra personnelle à l'utilisateur devront être affectée à la super globale $_SESSION. PHP ajoute aux entêtes de réponse un header setCookie avec l'identifiant de session afin que le navigateur enregistre ce cookie en mémoire.

* Sinon,

Un cookie existe chez le client et il envoie ce cookie dans les entêtes de la requête. Le serveur intercepte le cookie, ouvre le fichier de session de l'utilisateur avec l'identifiant de session stocké dans le cookie et peuple la super globale $_SESSION des informations dans le fichier.

### 🏷️ **State**

Avec ce mécanisme, un client peut avoir un résultat de réponse qui lui sera personnelle, pour la même adresse des clients auront des résultats différents, l'on parle alors d'application avec état, avec une mise en cache  bannir pour que les données de l'un ne soit pas disponible pour un autre. A l'inverse d'un web service.

___

## 📑 [Start](https://www.php.net/manual/fr/function.session-start.php)

La fonction `sesion_start` Démarre une nouvelle session ou reprend une session existante. Vous devez exécuter sesion_start avant qu'un affichage se produise parce que cette fonction envoie des entêtes http.

```php
session_start();
```

### 🏷️ **Utilisation**

Après avoir démarré une session, vous pouvez utiliser $_SESSION. C'est un tableau qui stock les données de l'utilisateur.

```php
if (!array_key_exists("count", $_SESSION)) {
    $_SESSION["count"] = 0;
}

echo ++$_SESSION["count"];
```

D'une requête à l'autre les valeurs de la session sont conservée grâce au mécanisme expliqué précédemment.

___

## 📑 [Stop](https://www.php.net/manual/fr/function.session-destroy.php)

Pour détruire les données de l'utilisateur il faut utiliser `session_destroy`. Cette fonction ne détruit pas les variables globales associées à la session, de même, elle ne détruit pas le cookie de session.

```php
session_destroy();
```

Mais attention, il faut également détruire le cookie de session coté client afin qu'il ne le renvoie pas, en en envoyant un programmatiquement et en fournissant une date passée.

### 🏷️ **Utilisation**

```php
session_destroy();
unset($_SESSION);
$params = session_get_cookie_params();
setcookie(
    session_name(),
    '',
    time() - 42000,
    $params["path"], $params["domain"],
    $params["secure"], $params["httponly"]
);
```

___

👨🏻‍💻 Manipulation

Utilisez le mécanisme de session pour fournir une fonctionnalité de type panier ou de type favoris.

___

## 📑 Configuration

Vous pouvez configurer la session de 3 façon différentes. Dans le php.ini, avec la fonction ini_set ou directement à l'ouverture de la session.

```php
session_start([
    "cache_limiter", "nocache",
    "cookie_httponly" => 1,
    "cookie_path" => "/",
    "use_cookies" => 1,
    "use_only_cookies" => 1,
    "use_strict_mode" => 1,
    "use_trans_sid" => 0,
]);
```
___

👨🏻‍💻 Manipulation

Observer dans le fichier `php.ini` les options exposées et discutons en.

___


### 🏷️ **Lifetime**

La durée de vie de la session n'est pas contrôlée, nous allons étudier les directives correspondant à sa durée de vie sur le disque et sa fréquence de nettoyage et la durée de vie du cookie. Par défaut la durée de vie du cookie vaut 0, le cookie est valide jusqu’à ce que le navigateur se ferme et sans limite de durée de vie ce qui est recommandé par php.net.

```php
ini_set("session.cookie_lifetime", 0); 
```

Mais vous pouvez avoir le besoin que le cookie possède une date d'expiration précise que le navigateur reste ouvert ou non. Dans ce cas en précisant une date d'expiration, le cookie ne sera plus utilisé quand la date d'expiration est dépassée, que le client soit actif ou non. L'impact est que si le client navigue depuis un certain temps et atteint la date d'expiration il se retrouve déconnecté du service même s'il est actif durant toute cette période. En précisant une date d'expiration il faut envoyer manuellement un cookie pour repousser la date d'expiration pour qu'elle corresponde à la date courante de rafraichissement plus celle d'expiration. Pour une expiration par exemple de 10 minutes sans que l'utilisateur se retrouve déconnecté malgré son activité il vaut mieux définir le cookie sans passer par la directive.

```php
ini_set("session.cookie_lifetime", 3600);
$params = session_get_cookie_params();
setcookie(
    session_name(),
    "",
    time() + 3600,
    $params["path"],
    $params["domain"],
    $params["secure"],
    $params["httponly"]
); 
```

### 🏷️ **Garbage**

La gestion de la durée de vie coté client a été abordée avec les cookies mais la durée de vie sur le disque peut aussi être configurée. La directive gc_maxlifetime définit une date d'expiration de la durée de vie du fichier sur le disque, si cette date arrive à expiration et que le garbage collector est appelé il supprimera le fichier. Le passage du GC peut être régulé en utilisant gc_probability et gc_divisor, dans l'exemple suivant le garbage est appelé avec une probabilité de 1/10.

```php
ini_set("session.gc_maxlifetime", 3600);
ini_set("session.gc_divisor", 10);
ini_set("session.gc_probability", 1);
```

### 🏷️ **Regenerate**

Pour se protéger efficacement contre la `fixation de session`, il faut penser à renouveler l'identifiant à chaque changement de privilège puis à chaque intervalle de temps régulier.

```php
session_regenerate_id(true);
```

___

👨🏻‍💻 Manipulation

Configurer votre session correctement.