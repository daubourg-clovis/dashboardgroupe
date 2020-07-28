<?php

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'equipment';

try{
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
}catch(PDOExeption $e){
    echo 'connection failed' / $e->getMessage();
}