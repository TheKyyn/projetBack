<?php
$host = 'localhost'; 
$dbName = 'blog'; // nom de la base de données
$user = 'root'; // login de la base de données
$password = 'myPassword'; // mdp

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
