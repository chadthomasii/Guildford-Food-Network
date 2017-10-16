<?php

require 'core/database.php';

if($_SERVER['REQUEST_METHOD'] === 'POST')
{

    $stmt= $database->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(":email", $_POST['email']);
    $stmt->execute();
    $results= $stmt->fetchAll(PDO::FETCH_OBJECT);
    $json = json_encode($results);
    echo $json;

}



