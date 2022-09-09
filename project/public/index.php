<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title> MemoryCard </title>
    <link rel="stylesheet" type="text/css" href="css/errors.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header-label">
                MemoryCard
            </div>
            <div class="header-menu">
                <?php
                if (!isset($_SESSION["username"])) {
                    echo "<a class='action' href='../app/view/login.php'>Se Connecter</a>";
                    echo "<a class='action' href='../app/view/signup.php'>S'enregistrer</a>";
                } else {
                    echo "<a class='action' href='../app/view/dashboard.php'>Dashboard</a>";
                    echo "<a class='action' href='../app/controler/logout.php'>Se déconnecter</a>";
                }
                ?>
            </div>
        </div>
        <div class="content">
            <a class="action" href="../app/view/categories.php">Catégories</a>
            <br></br>
        </div>

</body>

</html>