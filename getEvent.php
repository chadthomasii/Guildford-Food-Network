<?php

require 'core/database.php';

if($_SERVER['REQUEST_METHOD'] === 'POST')
{

    $stmt= $database->prepare("SELECT * FROM events WHERE name = :name");
    $stmt->bindParam(":name", $_POST['name']);
    $stmt->execute();
    $results= $stmt->fetchAll(PDO::FETCH_ASSOC);
    $json =json_encode($results);
    echo $json;

}

