<article class="col-12">

    <span class="col-4 display-4">
            <?= $vote->title ?>
    </span>
    <span class="col-4">
         <?= $vote->voters ?> votants
    </span>
    <span class="col-4">
        <?php if ($vote->active): ?>
            <button type="button" class="btn btn-primary">Active</button>
            <button type="button" class="btn btn-success">Vote</button>
        <?php else: ?>
            <button type="button" class="btn btn-danger">Closed</button>
            <button type="button" class="btn btn-success">Results</button>
        <?php endif; ?>
    </span>

</article>