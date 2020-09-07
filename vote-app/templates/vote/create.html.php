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
                    <input class="form-control" id="titre" name="title" placeholder="Titre">
                </div>
                <div class="col-12 col-md-6 form-group">
                    <label for="expiration">Expiration</label>
                    <input type="date" class="form-control" name="expiration" id="expiration">
                </div>
                <div class="vote-option-group col-12 col-md-6">
                    <div class="form-group">
                        <label for="option_1">Option 1</label>
                        <input class="vote-option form-control" id="option_1" name="options[]" placeholder="Option 1">
                    </div>
                    <div class="form-group">
                        <label for="option_2">Option 2</label>
                        <input class="vote-option form-control" id="option_2" name="options[]" placeholder="Option 2">
                    </div>
                </div>
                <div class="col-12">
                    <a class="add-option btn btn-secondary">Add option</a>
                </div>
                <div class="col-12 text-right">
                    <input type="submit" value="Créer" name="vote-form" class="btn btn-primary"/>
                </div>
            </form>
        </div>
    </div>
</main>

<script type="text/javascript" src="/assets/js/vote-create-add-option.js"></script>

<?php include __DIR__ . '/../footer.html.php' ?>
