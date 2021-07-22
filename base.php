<?php 
//Файл с базовыми функциями 
$host = "localhost";
$name = "appeals";
$user = "root";
$password = "root";

$pdo = new PDO("mysql:host=$host;dbname=$name", $user, $password); // подключение к базе данных


function makeRequest($sql){
    global $pdo;
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll();
    return $res;
}
?>