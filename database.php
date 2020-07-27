<?php

$server = 'localhost';
$user = 'root';
$password = '';
$db = 'equipment';

try{
    $pdo = new PDO("mysql:host=$server;dbname=$db", $user, $password);
}catch(PDOExeption $e){
    echo 'connection failed' / $e->getMessage();
}