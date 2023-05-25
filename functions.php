<?php
require_once 'config.php';

// inscription de l'utilisateur
function registerUser($username, $password) {
    global $pdo;
    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    try {
        $stmt = $pdo->prepare("INSERT INTO User (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $hashedPassword]);
        
        return true;
    } catch (PDOException $e) {
        echo "Erreur lors de l'inscription : " . $e->getMessage();
        return false;
    }
}

// verif des infos au moment du login
function login($username, $password) {
    global $pdo;
    
    try {
        $stmt = $pdo->prepare("SELECT * FROM User WHERE username = ?");
        $stmt->execute([$username]);
        
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['password'])) {
            // si info valides
            return $user;
        } else {
            // si info invalides
            return false;
        }
    } catch (PDOException $e) {
        echo "Erreur lors de la vérification des informations de connexion : " . $e->getMessage();
        return false;
    }
}

// on vérifie ici si l'utilisateur est admin
function isAdmin($userId) {
    global $pdo;
    
    try {
        $stmt = $pdo->prepare("SELECT isAdmin FROM User WHERE id = ?");
        $stmt->execute([$userId]);
        
        $user = $stmt->fetch();
        
        return $user['isAdmin'];
    } catch (PDOException $e) {
        echo "Erreur lors de la vérification du statut d'administrateur : " . $e->getMessage();
        return false;
    }
}

?>
