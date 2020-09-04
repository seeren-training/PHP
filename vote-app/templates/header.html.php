<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote App</title>
    <link rel="stylesheet" type="text/css" href="/node_modules/bootstrap/dist/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/app.css"/>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Vote App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link active" href="/votes/create">Create</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/votes">Show</a>
            </li>
        </ul>
    </div>
</nav>