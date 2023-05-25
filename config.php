<?php
$host = 'localhost'; // Adresse de l'hôte de la base de données
$dbName = 'blog'; // Nom de la base de données
$user = 'root'; // Nom d'utilisateur de la base de données
$password = 'Shankssangdelaveine'; // Mot de passe de la base de données

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
