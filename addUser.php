<?php

require 'classes/Database.php';

$arr = [];

if(isset($_GET['name']) && isset($_GET['password']) && isset($_GET['email']))
{

    $arr['name'] = $_GET['name'];
    $arr['password'] = $_GET['password'];
    $arr['email'] = $_GET['email'];


    $database->query('INSERT INTO distributors (name, password, email) VALUES (:name, :password, :email)');
    $database->bind(':name', $arr['name']);
    $database->bind(':password', md5($arr['password']));
    $database->bind(':email', $arr['email']);
    $database->execute();
   

}

else
{
    $arr['data'] = 'Data was not posted';
}


$json = json_encode($arr);
echo $json;