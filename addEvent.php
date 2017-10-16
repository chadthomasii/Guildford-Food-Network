<?php

require 'core/database.php';

$arr = [];

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    //Set the key/value pairs
    $arr['name'] = $_POST['name'];
    $arr['password'] = $_POST['password'];
    $arr['email'] = $_POST['email'];
    $arr['type'] = $_POST['type'];

    
    
    
    $stmt = $database->prepare('SELECT * FROM events WHERE email = :email');
    $stmt->bindParam(":email", $arr['email']);
    $stmt->execute();

    if($stmt->rowCount() < 1)
    {
        $arr['use'] = 'open';
        //Add to database
        $stmt = $database->prepare('INSERT INTO events (name, password, email, type) VALUES (:name, :password, :email, :type)');
        $stmt->bindParam(":name", $arr['name']);
        $stmt->bindParam(":password", md5($arr['password']));
        $stmt->bindParam(":email", $arr['email']);
        $stmt->bindParam(":type", $arr['type']);
        $stmt->execute();

            
            
        //Send back the id of new inserted user
        $arr['lastInsertId'] = $database->lastInsertId();
    
    }

    else
    {
        $arr['use'] = 'In use';
    }
    



}

else
{
    $arr['data'] = 'Data was not posted';
}



$json = json_encode($arr);
echo $json;