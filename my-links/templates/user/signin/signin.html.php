<?php $title = "Signin" ?>

<?php include '../templates/header.html.php' ?>

<main class="container">
    <form class="row col-12 offset-md-2 col-md-8 col-lg-6 offset-lg-3 mt-5"
          method="post" action="">
        <h1>Authenticate</h1>
        <div class="mt-5">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input value="<?= filter_var($form["email"]["value"],
                    FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>"
                       class="form-control"
                       id="email"
                       aria-describedby="emailHelp" name="email">
                <?php if ($form["email"]["error"]): ?>
                    <div class="text-danger"><?= $form["email"]["error"] ?></div>
                <?php endif ?>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input value="<?= filter_var($form["password"]["value"],
                    FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>"
                       type="password" class="form-control" id="password"
                       name="password">
                <?php if ($form["password"]["error"]): ?>
                    <div class="text-danger"><?= $form["password"]["error"] ?></div>
                <?php endif ?>
            </div>
            <button type="submit" class="btn btn-primary"><?= $title ?></button>
        </div>
    </form>
</main>

<?php include '../templates/footer.html.php' ?>
