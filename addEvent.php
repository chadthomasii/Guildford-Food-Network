<?php

require 'core/database.php';

$arr = [];

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    //Set the key/value pairs
    $arr['name'] = $_POST['name'];
    $arr['dateEvent'] = $_POST['dateEvent'];
    $arr['details'] = $_POST['details'];


    //Add to database
    $stmt = $database->prepare('INSERT INTO events (name, dateEvent, details) VALUES (:name, :dateEvent, :details)');
    $stmt->bindParam(":name", $arr['name']);
    $stmt->bindParam(":dateEvent", $arr['dateEvent']);
    $stmt->bindParam(":details", $arr['details']);
    $stmt->execute();

            
            
    //Send back the id of new inserted user
    $arr['lastInsertId'] = $database->lastInsertId();
    
}

else
{
    $arr['data'] = 'Data was not posted';
}



$json = json_encode($arr);
echo $json;