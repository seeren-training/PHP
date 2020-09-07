<?php include __DIR__ . '/../header.html.php' ?>

<main>
    <div class="container">
        <div class="row pt-3 pb-3">
            <h2 class="display-3 mt-3 mb-3">Vote</h2>
        </div>
        <?php if (null === $vote) : ?>
            <article class="pt-4 pb-4 col-12 row align-items-center border">
                <span class="col-12 col-md-4 h1">Le vote n'existe pas</span>

                <div class="col-12 col-md-2">
                    <a href="" class="col-12 btn btn-primary">Créer un vote</a>
                </div>
            </article>
        <?php else : ?>
            <article class="pt-4 pb-4 col-12 row align-items-center border">
                <span class="col-12 col-md-4 h1"><?= $vote->title ?></span>
                <span class="col-12 col-md-4"><?= $vote->voters ?> voters</span>
            </article>
        <?php endif ?>
    </div>
</main>

<?php include __DIR__ . '/../footer.html.php' ?>
