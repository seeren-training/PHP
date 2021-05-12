<?php

$title = "SignUP";
$form = [
    "email" => [
        "value" => filter_input(INPUT_POST, "email"),
        "error" => null
    ],
    "password" => [
        "value" => filter_input(INPUT_POST, "password"),
        "error" => null
    ],
    "confirm" => [
        "value" => filter_input(INPUT_POST, "confirm"),
        "error" => null
    ],
];

if ("" === $form["email"]["value"]) {
    $form["email"]["error"] = "Email requis";
} elseif ($form["email"]["value"]
    && !filter_var($form["email"]["value"], FILTER_VALIDATE_EMAIL)) {
    $form["email"]["error"] = "Email invalid";
}
if ("" === $form["password"]["value"]) {
    $form["password"]["error"] = "Password requis";
} elseif ($form["password"]["value"]
    && 6 > strlen($form["password"]["value"])) {
    $form["password"]["error"] = "Password minimum 6";
}
if ($form["confirm"]["value"] !== $form["password"]["value"]) {
    $form["confirm"]["error"] = "Confirm doit correspondre au mot de passe";
}

if (null === $form["email"]["error"]
    && null === $form["password"]["error"]
    && null === $form["confirm"]["error"]
    && null !== $form["email"]["value"]
    && null !== $form["password"]["value"]
    && null !== $form["confirm"]["value"]) {
    $filename = './../vars/' . md5($form["email"]["value"]) . '.json';
    $fileExists = is_file($filename);
    if (false === $fileExists) {
        $user = [
            "id" => null,
            "email" => $form["email"]["value"],
            "password" => password_hash($form["password"]["value"], PASSWORD_DEFAULT),
            "favorites" => [],
        ];
        file_put_contents($filename, json_encode($user));
        header("Location: /signin");
        exit;
    }
    $form["email"]["error"] = "Email already exists";
}

include '../templates/header.html.php';

?>

<main class="container">
    <form class="row col-12 offset-md-2 col-md-8 col-lg-6 offset-lg-3 mt-5"
          method="post" action="">
        <h1>
            <?= $title ?>
        </h1>
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
            <div class="mb-3">
                <label for="confirm"
                       class="form-label">Confirm</label>
                <input value="<?= filter_var($form["confirm"]["value"], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>"
                       type="password" class="form-control" id="confirm"
                       name="confirm">
                <?php if ($form["confirm"]["error"]): ?>
                    <div class="text-danger"><?= $form["confirm"]["error"] ?></div>
                <?php endif ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</main>

<?php include '../templates/footer.html.php' ?>
