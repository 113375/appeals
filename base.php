<?php 
$host = "localhost"
$name = "appeals"
$user = "root"
$password = "root"
$pdo = new PDO("mysql:host=$host;dbname=$name", $user, $password); // подключение к базе данных
$stmt = $pdo->prepare("SELECT * FROM topic");
$stmt->execute()