<?php include __DIR__ . '/../header.html.php' ?>

<main>
    <div class="container">
        <div class="row pt-3 pb-3">
            <h2 class="display-3 mt-3 mb-3">Vote</h2>
        </div>
        <?php if (!$vote->optionList) : ?>
            <article class="pt-4 pb-4 col-12 row align-items-center border">
                <span class="col-12 col-md-4 h1">Le vote n'existe pas</span>
                <div class="col-12 col-md-2">
                    <a href="" class="col-12 btn btn-primary">Créer un vote</a>
                </div>
            </article>
        <?php else : ?>
            <div class="row pt-3 pb-3">
                <h3 class="display-4 mt-3 mb-3"><?= $vote->question ?></h3>
            </div>
            <div class="row pt-3 pb-3 border">
                <form action="" method="post" class="row col-12" onsubmit="alert('Make it Work!')">
                    <div class="col-12 col-md-6 form-group">
                        <?php foreach ($vote->optionList as $key => $option): ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="option" id="option_<?= $key ?>"
                                       value="option1">
                                <label class="form-check-label" for="option_<?= $key ?>"><?= $option->label ?></label>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <div class="col-12 text-right">
                        <input type="submit" name="option-form" value="Voter" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        <?php endif ?>
    </div>
</main>

<?php include __DIR__ . '/../footer.html.php' ?>
