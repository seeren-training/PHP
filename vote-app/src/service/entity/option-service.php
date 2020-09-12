<?php

function createOptionList(array $optionList)
{
    require_once __DIR__ . "/../../entity/option.php";
    foreach ($optionList as $key => $value) {
        $option = newOption();
        $option->label = $value;
        $optionList[$key] = $option;
    }
    return $optionList;
}

function insertOptionList(array $optionList, int $vote): array
{
    require_once __DIR__ . "/../manager/manager-service.php";
    $errorList = [];
    $dbh = getConnection();
    foreach ($optionList as $option) {
        $dbh->prepare("INSERT INTO `option`(`label`, `voters`,`vote`) VALUES (:label, :voters, :vote)")
            ->execute([":label" => $option->label, ":voters" => 0, ":vote" => $vote,]);
    }
    return $errorList;
}
