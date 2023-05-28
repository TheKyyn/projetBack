<?php
require_once 'functions.php';

session_start();

// vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: ./login.php');
    exit;
}

$userId = $_SESSION['user_id'];
$isAdmin = isAdmin($userId);

// traitement du formulaire de création de post
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    if (createPost($title, $content, $userId)) {
        echo "Le post a été créé avec succès.";
    } else {
        echo "Erreur lors de la création du post.";
    }
}

// traitement du formulaire de modification de post
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $postId = $_POST['postId'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    if ($isAdmin || updatePost($postId, $title, $content, $userId)) {
        echo "Le post a été modifié avec succès.";
    } else {
        echo "Erreur lors de la modification du post.";
    }
}

// traitement du formulaire de suppression de post
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $postId = $_POST['postId'];
    
    if ($isAdmin || deletePost($postId, $userId)) {
        echo "Le post a été supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression du post.";
    }
}

$posts = getPosts();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>
</head>
<body>
    <h1>Posts</h1>
    
    <?php foreach ($posts as $post): ?>
    <div>
        <h2><?= $post['title'] ?></h2>
        <p><?= $post['content'] ?></p>

        <?php if ($isAdmin || $post['userId'] == $userId): ?>
        <form method="POST">
            <input type="hidden" name="postId" value="<?= $post['id'] ?>">
            <label for="title">Titre :</label>
            <input type="text" id="title" name="title" value="<?= $post['title'] ?>" required>

            <label for="content">Contenu :</label>
            <textarea id="content" name="content" required><?= $post['content'] ?></textarea>

            <button type="submit" name="update">Modifier</button>
            <button type="submit" name="delete">Supprimer</button>
        </form>
        <?php endif; ?>
    </div>
    <?php endforeach; ?>

    <h2>Nouveau post</h2>

    <form method="POST">
        <label for="title">Titre :</label>
        <input type="text" id="title" name="title" required>

        <label for="content">Contenu :</label>
        <textarea id="content" name="content" required></textarea>

        <button type="submit" name="create">Créer</button>
    </form>
</body>
</html>
