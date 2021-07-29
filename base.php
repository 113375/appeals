<?php 
//Файл с базовыми функциями 
$host = "localhost";
$name = "u1437231_default";
$user = "u1437231_default";
$password = "UxXzHBVneQNL6198";

$pdo = new PDO("mysql:host=$host;dbname=$name", $user, $password); // подключение к базе данных


function makeRequest($sql){
    global $pdo;
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll();
    return $res;
}
?>