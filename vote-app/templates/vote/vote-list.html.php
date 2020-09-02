<?php include __DIR__ . '/../header.html.php' ?>

<main>
    <div class="container">
        <div class="row pt-3 pb-3">
            <h2 class="display-3 mt-3 mb-3">Liste des votes</h2>
            <form class="ml-auto">
                <div class="form-group">
                    <label for="filter" class="d-none">Filter</label>
                    <select class="form-control" id="filter">
                        <option>Recent</option>
                        <option>Active</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="row pt-3 pb-3 mt-3 mb-3">
            <?php foreach ($voteList as $key => $vote) :
                include __DIR__ . '/vote-list-item.html.php';
            endforeach ?>
        </div>

    </div>
</main>

<?php include __DIR__ . '/../footer.html.php' ?>
