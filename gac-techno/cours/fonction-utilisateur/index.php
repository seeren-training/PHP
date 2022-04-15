
<?php


function sayHello ($firstname) {
    $message =  'Hello Welcome ' . $firstname;
    echo $message;
    return $message; 
}


$returnedMessage = sayHello('John');

echo $returnedMessage;