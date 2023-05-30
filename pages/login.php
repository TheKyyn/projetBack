<?php
require_once 'functions.php';


session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: ../index.php'); 
    exit;
}

// formulaire de connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    
    $user = login($username, $password);
    
    if ($user) {
        // si l'auth a été faite avec succès
        session_start();
        $_SESSION['user_id'] = $user['id'];
        
        
        header('Location: ../index.php');
        exit;
    } else {
        // sinon, erreur
        echo "Identifiants invalides.";
    }
}
?>

<!-- Formulaire de connexion -->
<form method="POST">
    <label for="username">Nom d'utilisateur :</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Se connecter</button>
</form>
