<?php 
//Файл с базовыми функциями 
$host = "localhost";
$name = "u1437231_default";
$user = "u1437231_default";
$password = "kifzy0-nispum-hYnvaj";

$pdo = new PDO("mysql:host=$host;dbname=$name;charset=UTF8", $user, $password); // подключение к базе данных


function makeRequest($sql){
    global $pdo;
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll();
    return $res;
}
?>