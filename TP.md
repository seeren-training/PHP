# 🎓  TP - PHP

> ⚠️ The English skill is a transversal skill required by your referentiel

**You will be evaluated on your ability to meet the following 📝 functional goals.**

You can use `include`, `variable`, `conditionnal`, `loop`, `function` syntax, learn about http response with `echo` and `header` and are sensibilised about decompositoon with the `view` and the `controller` layout.

## 🐣 Previously

You've work on implementing a function named `showAll` to display a list of vote.

## 🐥 Now

You're gonna continue on the function thematic and start to use language feature with super globales. 

> It's really the time to write a function at one place, with the good path and to call her at an other place, seriously. Be risponsible of the code you produce, your futur job is to produce code by your own one time you have syntax and concept explaination.

___

### 👨🏻‍💻 Functions

> You have to continue your function implementation

📝 The `showAll` function of the vote controller must display the list of votes.

#### **The vote issue**

In your controller you create manually votes but now with functions we can make it easier. 

```php
// So bad
$voteA = new stdClass();
$voteA->title = "Vote A";
$voteA->active = true;
$voteB = new stdClass();
$voteB->title = "Vote B";
$voteB->active = false;
```

📝 In the folder `src/entity` create a file named as you want who have a function named as you want. This function is responsible to create and provide a vote. Implements this function and use it in the controller for fix our issue.

> We can understand from this manipulation that a good practice is to isolate our data structure far from controllers for better reutilisability and understanding. It is the `model` layout.

___

### 👨🏻‍💻 Superglobales

It's time to use the basic language to achieve some logic using new features.

#### **Server**

> 🛑 The idea will be to display the vote list for the corresponding url.

There is some global variables you can use anywhere in your program, we call them super globales. One of them is `$_SERVER`, it gave you information about the server parameters using an associative array. 

*Look at it using the code source page of your browser for a better line jump.*

```php
var_dump($_SERVER);
```

You can access safely to an element of this array using the `filter_input` function.

```php
$method = filter_input(INPUT_SERVER, "REQUEST_METHOD");
```

📝 On the entry point of your program, create an `$url `variable that correspond to the url path of your browser using the super global server and the filter_input function.

> Make the good choice, try different url in the browser to determine your choice.

📝 When the url value is `"/votes"`, display the vote list.

📝 Otherwise display an `404` error page.

> 🤔 Display an error page.. so I have to create controller and view I think because it's the way we do it.

*It's time to requalify your template organisation, each controller must be represented by a folder and each function have to be representade by a file.*

```bash
templates/
|
└─ error/
   └─ show.html.php
```

#### **Get**

> 🛑 The idea is to display one vote using url parameter.

The `$_GET` super global give you information about parameters in the url in an associative array with parameters name and value. 

For exemple, per the following url: `localhost:8000/?hello=world`, you will have an array with the key 'hello' and the value 'world'.

*Look at for the url in exemple using the code source page of your browser for a better line jump.*

```
var_dump($_GET);
```

You can access safely to an element of this array using the `filter_input` function.

```php
$hello = filter_input(INPUT_GET, "hello");
```

📝 In your template, provide a link on each vote for consult them later using a property like id per exemple. The url path must be the following: `/votes?id=4`.

*You will have to assign an id on each vote and will have to use this id to forge the url described.*

```php
$vote->id = 4;
```

📝 When the url value is `"/votes"` and a get parameter is present for the key id, for exemple `'?id=4'`, display the vote with the id `4`.


📝 When a get parameter is present for the key id and that there is no vote for this id, explain in your template that the vote do not exists!.

> Hey hey seriously wait me know I have to talk about the Post super global.

___

## 🦆 Next

📝 Use Bootstrap gride to master your element position and dimension.

___

## 🕕 Manage your time

There is some logic coming to target your functional goal!
