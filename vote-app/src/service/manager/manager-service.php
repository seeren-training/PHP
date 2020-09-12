<?php

function getConnection(): PDO
{
    require_once __DIR__ . "/../../../config/database.php";
    static $dbh;
    if (!$dbh) {
        $dbh = new PDO($dsn, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
    return $dbh;
}
