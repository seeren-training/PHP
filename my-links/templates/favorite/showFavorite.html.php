<?php $title = "Favorites" ?>

<?php include '../templates/header.html.php' ?>

<nav class="navbar navbar-light bg-dark container-fluid justify-content-end">
    <a class="btn btn-outline-success me-2" href="/favorites">
        Newest
    </a>
    <a class="btn btn-outline-danger me-2" href="/favorites?sort=asc">
        Older
    </a>
</nav>

<main class="container">
    <?php if (0 === count($favorites)) : ?>
        <div class="mt-4 text-center">
            <h1>You do not have favorite</h1>
            <p>Start by adding some favorite URL</p>
        </div>
    <?php else: ?>
        <div class="row">
            <style scoped>
                .card-title img {
                    width: 1em;
                    height: 1em;
                }

                .card-title a {
                    color: inherit;
                    text-decoration: none;
                }

                iframe {
                    width: 100%;
                }
            </style>
            <?php foreach ($favorites as $key => $favorite) : ?>
                <div class="favorite col-6 col-md-4 col-lg-3 mt-3 mb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="card-title">
                                <img class="me-2"
                                     src="<?= $favorite["favicon"] ?>"
                                     alt=""/>
                                <span><?= $favorite["title"] ?></span>
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <?php if ($favorite["preview"]): ?>
                                    <iframe width="300" height="200"
                                            src="https://www.youtube.com/embed/<?=
                                            $favorite["preview"] ?>"
                                            title="YouTube video player"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                <?php elseif ($favorite["description"]): ?>
                                    <?= $favorite["description"] ?>
                                <?php else: ?>
                                    <span class="blockquote-footer">No description avalaible</span>
                                <?php endif ?>
                            </p>
                        </div>
                        <div class="card-footer">
                            <a target="_blank" href="<?= $favorite["href"] ?>"
                               class="btn btn-primary">Visit</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>

<script>
    <?php include '../templates/favorite/showFavorite.js' ?>
</script>

<?php include '../templates/footer.html.php' ?>
