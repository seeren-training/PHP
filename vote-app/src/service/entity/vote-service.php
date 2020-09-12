<?php

function insertVote(stdClass $vote): array
{
    require_once __DIR__ . "/../manager/manager-service.php";
    require_once __DIR__ . "/option-service.php";
    $errorList = [];
    $dbh = getConnection();
    try {
        $dbh->prepare(
            "INSERT INTO vote (question, expiration) "
            . "VALUES (:question, :expiration)"
        )->execute([":question" => $vote->question, ":expiration" => $vote->expiration,]);
        $vote->id = $dbh->lastInsertId();
        insertOptionList($vote->optionList, $vote->id);
    } catch (PDOException $e) {
        $errorList["question"] = true;
    }
    return $errorList;
}

function findAllVote(int $limit = 10): array
{
    require_once __DIR__ . "/../manager/manager-service.php";
    $dbh = getConnection();
    $sth = $dbh->prepare(
        "SELECT vote.id, question, expiration, SUM(voters) FROM vote "
        . "JOIN option on vote.id = option.vote "
        . "GROUP BY vote.id  "
        . "ORDER BY vote.id DESC "
        . "LIMIT $limit"
    );
    $sth->execute();
    $votes = $sth->fetchAll(PDO::FETCH_OBJ);
    foreach ($votes as $vote) {
        $vote->voters = $vote->{"SUM(voters)"};
        unset($vote->{"SUM(option.voters)"});
    }
    return $votes;
}

function findVote(int $id): ?stdClass
{
    require_once __DIR__ . "/../manager/manager-service.php";
    require_once __DIR__ . "/../../entity/vote.php";
    require_once __DIR__ . "/../../entity/option.php";
    $dbh = getConnection();
    $sth = $dbh->prepare(
        "SELECT vote.question, vote.expiration, option.id, option.label, option.voters, option.vote "
        . "FROM vote "
        . "JOIN option ON option.vote = vote.id "
        . "WHERE vote.id = $id"
    );
    $sth->execute();
    $vote = newVote();
    if (($votes = $sth->fetchAll(PDO::FETCH_OBJ))) {
        $vote->id = $votes[0]->vote;
        $vote->question = $votes[0]->question;
        $vote->expiration = $votes[0]->expiration;
    }
    foreach ($votes as $value) {
        $option = newOption();
        $option->id = $value->id;
        $option->label = $value->label;
        $option->voters = $value->voters;
        $vote->optionList[] = $option;
    }
    return $vote;
}
