<?php
require_once 'functions.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    
    if (registerUser($username, $password)) {
        // si l'inscription réussie
        header('Location: ./register-success.php');
        exit;
    } else {
        // sinon erreur
        echo "Erreur lors de l'inscription.";
    }
}
?>

<!-- Formulaire d'inscription -->
<form method="POST">
    <label for="username">Nom d'utilisateur :</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">S'inscrire</button>
</form>
