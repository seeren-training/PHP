<?php

$title = "My Link";
include '../templates/header.html.php';

$linkList = [
    [
        'text' => "Home seeren-trainning/JavaScript Wiki",
        'href' => "https://github.com/seeren-training/JavaScript/wiki",
        'contentType' => "text/html",
        'favicon' => "https://github.com/favicon.ico",
        'preview' => null,
        'commentList' => [],
    ],
    [
        'text' => "Home seeren-trainning/PHP Wiki",
        'href' => "https://github.com/seeren-training/PHP/wiki",
        'contentType' => "text/html",
        'favicon' => "https://github.com/favicon.ico",
        'preview' => null,
        'commentList' => [],
    ],
    [
        'text' => "Home seeren-trainning/PHP Object Wiki",
        'href' => "https://github.com/seeren-training/PHP-Object/wiki",
        'contentType' => "text/html",
        'favicon' => "https://github.com/favicon.ico",
        'preview' => null,
        'commentList' => [],
    ],
];

?>

<main>
    <div>
        <ul>
            <?php foreach ($linkList as $link): ?>

                <li>
                    <a href="<?= $link['href'] ?>" target="_blank">
                        <img src="<?= $link['favicon'] ?>"/>
                        <?= $link['text'] ?>
                    </a>
                </li>

            <?php endforeach ?>
        </ul>
    </div>

</main>

<?php include '../templates/footer.html.php' ?>
