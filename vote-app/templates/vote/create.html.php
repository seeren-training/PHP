<?php include __DIR__ . '/../header.html.php' ?>

<main>
    <div class="container">
        <div class="row pt-3 pb-3">
            <h2 class="display-3 mt-3 mb-3">Create a vote</h2>
        </div>
        <div class="row pt-3 pb-3">
            <form class="row col-12" method="post" action="">
                <div class="col-12 col-md-6 form-group">

                    <label for="titre">Titre</label>
                    <?php if (array_key_exists("title", $errorList)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Le titre est requis
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif ?>

                    <input value="<?= filter_var($vote->title, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>" class="form-control" id="titre" name="title" placeholder="Titre">
                </div>
                <div class="col-12 col-md-6 form-group">
                    <label for="expiration">Expiration</label>

                    <?php if (array_key_exists("expiration", $errorList)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            L'expiration doit être supérieure à maintenant
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif ?>

                    <input value="<?= filter_var($vote->expiration, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>" type="date" class="form-control" name="expiration" id="expiration">
                </div>
                <div class="vote-option-group col-12 col-md-6">
                    <?php foreach ($vote->optionList as $key => $option): ?>
                        <div class="form-group">
                            <label for="option_<?= $key ?>">Option <?= $key + 1 ?></label>

                            <?php if (array_key_exists("option-$key", $errorList)): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    L'option est requise
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif ?>

                            <input class="vote-option form-control" value="<?= filter_var($option, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>" id="option_<?= $key ?>" name="options[]" placeholder="Option">
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="col-12">
                    <a class="add-option btn btn-secondary">Add option</a>
                </div>
                <div class="col-12 text-right">
                    <input type="submit" name="vote-form" class="btn btn-primary"/>
                </div>
            </form>
        </div>
    </div>
</main>

<script type="text/javascript" src="/assets/js/vote-create-add-option.js"></script>

<?php include __DIR__ . '/../footer.html.php' ?>
