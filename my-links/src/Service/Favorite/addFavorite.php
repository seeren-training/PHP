<?php

include_once '../src/Database/getConnexion.php';
include '../src/Service/Favorite/buildFavorite.php';

function addFavorite(array $form): bool
{
    $content = file_get_contents($form["favorite"]["value"]);
    if ($content) {
        $favorite = buildFavorite($form["favorite"]["value"], $content);
        $dbh = getConnexion();
        $dbh->beginTransaction();
        try {
            $sth = $dbh->prepare("INSERT INTO `favorite` (`href`, `title`, `description`) VALUES (:href, :title, :description)");
            $sth->execute([
                "href" => $favorite['href'],
                "title" => $favorite['title'],
                "description" => $favorite['description'],
            ]);
            $sth = $dbh->prepare("INSERT INTO `user_favorite` (`user_id`, `favorite_id`) VALUES (:user_id, :favorite_id)");
            $sth->execute([
                "user_id" => $_SESSION["user"]["id"],
                "favorite_id" => $dbh->lastInsertId()
            ]);
            $dbh->commit();
        } catch (Throwable $e) {
            $dbh->rollBack();
        }
        return true;
    }
    return false;
}
