<?php

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

// Récupération de l'index et de l'élément en cours d'itération
foreach ($ticketList as $index => $ticket) {
    var_dump($ticket);
}
