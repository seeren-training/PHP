<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./node_modules/bootstrap/dist/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="./assets/css/app.css"/>
</head>
<body>

<?php include './../templates/header.html.php' ?>

<main>
    <div class="container">
        <div class="row pt-3">
            <h2 class="display-3">
                List des votes
            </h2>
            <form class="ml-auto">
                <div class="form-group">
                    <select class="form-control">
                        <option>Date</option>
                        <option>Status</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="row pt-3 pb-3">
            <?php foreach ($voteList as $vote) : ?>
                <?php include './../templates/vote.html.php' ?>
            <?php endforeach; ?>
        </div>

    </div>

</main>

<?php include './../templates/footer.html.php' ?>

<script type="text/javascript" src="./node_modules/jquery/dist/jquery.js"></script>
<script type="text/javascript" src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script type="text/javascript" src="./assets/js/app.js"></script>
</body>

</html>
