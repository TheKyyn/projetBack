<?php

$pdo = new PDO("mysql:host=host.docker.internal:3307;dbname=blog", "root", $_ENV['MYSQL_ROOT_PASSWORD']);

$stmt = $pdo->query("SHOW TABLES;");
var_dump($stmt->fetch());

header('Location: login.php');