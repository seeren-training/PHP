# XSS

*  🔖 **Définition**
*  🔖 **Filter**

___

![images](https://raw.githubusercontent.com/seeren-training/PHP/master/wiki/resources/xss.png)

## 📑 [Définition](https://www.php.net/manual/fr/language.variables.superglobals.php)

Le cross-site scripting (abrégé XSS) est un type de faille de sécurité des sites web permettant d'injecter du contenu dans une page, provoquant ainsi des actions sur les navigateurs web visitant la page.

Il y a 3 catégories d'injection XSS possibles, reflected, stored, DOM Based.

La troisème utilise le fragment de l'URL qui n'est pas envoyé à PHP et ne nou concerne pas. En revanche le deux premières nous interessent.

### 🏷️ **Reflected**

Si une portion d'url contient de la donnée potentiellement capable d'éxécuter un script comme:

```bash
?name=<script>alert("Hey")</script>
```

Et si cette donnée est affichée par notre programme sans être sécurisée:

```php
echo filter_input(INPUT_GET, "name");
```

Alors il y a un problème concernant la sécurité es données de l'utilisateur qui affiche cette page. En effet JavaScript a la capacité d'enregistrer des évènements pour capturer la saisie utilisateur, la capacité de vider le stockage local du navigateur et d'envoyer ces informations à un serveur pour qu'elles soient stockées.

### 🏷️ **Stored**

Une injection XSS peut être plus persistente et concerner tous les utilisateurs si la valeur malveillante est stockée dans une base de données et réaffichée sans protection pour tous les utilisateurs qui accèdent à une page qui fait une extraction de donnée pour l'afficher d'une façon non sécurisée.

___

## 📑 [Filter](https://www.php.net/manual/fr/function.filter-var.php)

Vous devez au niveau de vos vues échapper la donnée avant de l'afficher.

`filter_var` est utile pour cela, elle prend en argument la valeur à échapper puis des drapeaux de validation ou de nettoyage. Le drapeau de nettoyage nous interesse.

🔗 [Types de drapeaux](https://www.php.net/manual/fr/filter.filters.sanitize.php)

```php
echo filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
```

___

👨🏻‍💻 Manipulation

Rendez sécure votre affichage contre les injections XSS
