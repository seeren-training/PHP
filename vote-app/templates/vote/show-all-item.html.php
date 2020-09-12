<article class="pt-4 pb-4 col-12 row align-items-center border bg-<?= $key % 2 ? "light" : "white" ?>">
    <span class="col-12 col-md-4 h1"><?= $vote->question ?></span>
    <span class="col-12 col-md-4"><?= $vote->voters ?> voters</span>
    <?php if ($vote->expiration > time()): ?>
        <div class="col-12 col-md-2">
            <span class="mt-2 mb-2 badge badge-secondary">Active</span>
        </div>
        <div class="col-12 col-md-2">
            <a href="/votes?id=<?= $vote->id ?>" class="col-12 btn btn-success">Vote</a>
        </div>
    <?php else: ?>
        <div class="col-12 col-md-2">
            <span class="mt-2 mb-2 badge badge-secondary">Closed</span>
        </div>
        <div class="col-12 col-md-2">
            <a href="/votes?id=<?= $vote->id ?>" class="col-12 btn btn-primary">Results</a>
        </div>
    <?php endif ?>
</article>