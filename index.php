<?php

$pdo = new PDO("mysql:host=host.docker.internal:3307;dbname=blog", "root", $_ENV['MYSQL_ROOT_PASSWORD']);

?>

<!DOCTYPE html>
<html>
<head>
    <title>MyBlog</title>
</head>
<body>
    <h1>Bienvenue sur MyBlog</h1>
    
    <nav>
        <ul>
            <li><a href="pages/login.php">Se connecter</a></li>
            <li><a href="pages/register.php">S'inscrire</a></li>
        </ul>
    </nav>
</body>
</html>
