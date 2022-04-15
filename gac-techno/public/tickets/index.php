<?php

$title = 'Ticket List';
$ticketList = [
    [
        'label' => 'Issue',
        'description' => 'An item',
    ],
    [
        'label' => 'Risky',
        'description' => 'An second item',
    ],
    [
        'label' => 'Normal',
        'description' => 'An third item',
    ],
    [
        'label' => 'Issue',
        'description' => 'An fourth item',
    ],
];
$levelList = [
    'Issue' => 'danger',
    'Risky' => 'warning',
    'Normal' => 'info',
    'Basic' => 'success',
];


?>

<?php include __DIR__ . '/../../includes/header.php' ?>

<!-- Content -->
<main class="d-flex flex-grow-1 flex-shrink-0 container pt-4 pb-4">

    <!-- Ticket List content -->
    <div class="row pt-4 pb-4 w-100">

        <div class=" col col-4">
            <div class="h-100 card position-relative">
                <h2 class="card-title p-2">Todo</h2>
                <ul class="list-group list-group-flush">
                    <?php foreach ($ticketList as $index => $ticket) { ?>
                        <span class="badge bg-<?= $levelList[$ticket['label']] ?>"><?= $ticket['label'] ?></span>
                        <li class="list-group-item">
                            <a href="./show.html" class="text-decoration-none text-dark">
                                <?= $ticket['description'] ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <div class=" col col-4">
            <div class="h-100 card position-relative">
                <h2 class="card-title p-2">Doing</h2>
                <ul class="list-group list-group-flush">
                </ul>
            </div>
        </div>

        <div class=" col col-4">
            <div class="h-100 card position-relative">
                <h2 class="card-title p-2">Done</h2>
                <ul class="list-group list-group-flush">
                </ul>
            </div>
        </div>

</main>

<?php include __DIR__ . '/../../includes/footer.php' ?>