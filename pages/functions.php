<?php


function registerUser($username, $password) {
    $pdo = new PDO("mysql:host=host.docker.internal:3307;dbname=blog", "root", $_ENV['MYSQL_ROOT_PASSWORD']);

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

// Verif des infos au moment du login
function login($username, $password) {
    $pdo = new PDO("mysql:host=host.docker.internal:3307;dbname=blog", "root", $_ENV['MYSQL_ROOT_PASSWORD']);

    try {
        $stmt = $pdo->prepare("SELECT * FROM User WHERE username = ?");
        $stmt->execute([$username]);

        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Si info valides
            return $user;
        } else {
            // Si info invalides
            return false;
        }
    } catch (PDOException $e) {
        echo "Erreur lors de la vérification des informations de connexion : " . $e->getMessage();
        return false;
    }
}


function isAdmin($userId) {
    $pdo = new PDO("mysql:host=host.docker.internal:3307;dbname=blog", "root", $_ENV['MYSQL_ROOT_PASSWORD']);

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

// récup les posts déjà faits
function getPosts() {
    $pdo = new PDO("mysql:host=host.docker.internal:3307;dbname=blog", "root", $_ENV['MYSQL_ROOT_PASSWORD']);

    try {
        $stmt = $pdo->prepare("SELECT * FROM Post");
        $stmt->execute();

        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des posts : " . $e->getMessage();
        return false;
    }
}


function getPost($id) {
    $pdo = new PDO("mysql:host=host.docker.internal:3307;dbname=blog", "root", $_ENV['MYSQL_ROOT_PASSWORD']);

    try {
        $stmt = $pdo->prepare("SELECT * FROM Post WHERE id = ?");
        $stmt->execute([$id]);

        return $stmt->fetch();
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération du post : " . $e->getMessage();
        return false;
    }
}


function createPost($title, $content, $userId) {
    $pdo = new PDO("mysql:host=host.docker.internal:3307;dbname=blog", "root", $_ENV['MYSQL_ROOT_PASSWORD']);

    try {
        $stmt = $pdo->prepare("INSERT INTO Post (title, content, userId) VALUES (?, ?, ?)");
        $stmt->execute([$title, $content, $userId]);

        return true;
    } catch (PDOException $e) {
        echo "Erreur lors de la création du post : " . $e->getMessage();
        return false;
    }
}

// modifier un post
function updatePost($id, $title, $content, $userId) {
    $pdo = new PDO("mysql:host=host.docker.internal:3307;dbname=blog", "root", $_ENV['MYSQL_ROOT_PASSWORD']);

    try {
        $stmt = $pdo->prepare("UPDATE Post SET title = ?, content = ? WHERE id = ? AND userId = ?");
        $stmt->execute([$title, $content, $id, $userId]);

        return true;
    } catch (PDOException $e) {
        echo "Erreur lors de la modification du post : " . $e->getMessage();
        return false;
    }
}

// suppr un post
function deletePost($id, $userId) {
    $pdo = new PDO("mysql:host=host.docker.internal:3307;dbname=blog", "root", $_ENV['MYSQL_ROOT_PASSWORD']);

    try {
        $stmt = $pdo->prepare("DELETE FROM Post WHERE id = ? AND userId = ?");
        $stmt->execute([$id, $userId]);

        return true;
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression du post : " . $e->getMessage();
        return false;
    }
}



?>