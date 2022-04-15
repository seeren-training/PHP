<?php

function getTicketList()
{
    $fileContent = file_get_contents(__DIR__ . '/tickets.serialize');
    $ticketList = unserialize($fileContent);
    return $ticketList;
}
