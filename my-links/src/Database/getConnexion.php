<?php

function getConnexion(): PDO
{
    return  new PDO(
        "mysql:host=localhost;dbname=my_links;charset=utf8mb4;",
        "root",
        ""
    );
}
