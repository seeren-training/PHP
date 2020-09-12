<form class="row col-12" method="post" action="">
    <div class="col-12 col-md-6 form-group">
        <label for="question">Titre</label>
        <?php if (array_key_exists("question", $errorList)):
            $alert = "La quesion est requise et ne doit pas déjà exister";
            include __DIR__ . '/../alert.html.php';
        endif ?>
        <input value="<?= filter_var($vote->question, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>"
               class="form-control" id="question" name="question" placeholder="Question">
    </div>
    <div class="col-12 col-md-6 form-group">
        <label for="expiration">Expiration</label>
        <?php if (array_key_exists("expiration", $errorList)):
            $alert = "L'expiration doit être supérieure à maintenant";
            include __DIR__ . '/../alert.html.php';
        endif ?>
        <input value="<?= date("Y-m-d", $vote->expiration) ?>" type="date"
               class="form-control" name="expiration" id="expiration">
    </div>
    <div class="vote-option-group col-12 col-md-6">
        <?php foreach ($vote->optionList as $key => $option): ?>
            <div class="form-group">
                <label for="option_<?= $key ?>">Option <?= $key + 1 ?></label>
                <?php if (array_key_exists("option-$key", $errorList)):
                    $alert = "L'option est requise";
                    include __DIR__ . '/../alert.html.php';
                endif ?>
                <input class="vote-option form-control"
                       value="<?= filter_var($option->label, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>"
                       id="option_<?= $key ?>" name="optionList[]" placeholder="Option">
            </div>
        <?php endforeach ?>
    </div>
    <div class="col-12">
        <a class="add-option btn btn-secondary">Add option</a>
    </div>
    <div class="col-12 text-right">
        <input type="submit" name="vote-form" calue="Créer" class="btn btn-primary"/>
    </div>
</form>