<?php

require 'classes/Database.php';

$arr = [];

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    //Set the key/value pairs
    $arr['name'] = $_POST['name'];
    $arr['password'] = $_POST['password'];
    $arr['email'] = $_POST['email'];
   

    

    //Add to Database
    $database->query('INSERT INTO distributors (name, password, email) VALUES (:name, :password, :email)');
    $database->bind(':name', $arr['name']);
    $database->bind(':password', md5($arr['password']));
    $database->bind(':email', $arr['email']);
    $database->execute();

    
    
    //Send back the id of new inserted user
    $arr['lastInsertId'] = $database->lastInsertId();



}

else
{
    $arr['data'] = 'Data was not posted';
}



$json = json_encode($arr);
echo $json;