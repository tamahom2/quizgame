<?php
include("../controler/DB.php");
session_start();
$db = new DB();
if (empty($_SESSION["username"])) {
    header("location:signup.php");
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title> Category </title>
    <link rel="stylesheet" type="text/css" href="../../public/css/errors.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/main.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header-label">
                Catégories
            </div>
            <div class="header-menu">
                <a class="action" href="dashboard.php">Dashboard</a>
                <a class="action" href="../../public/index.php">Accueil</a>
                <a class="action" href="changepassword.php">Changer le mot de passe</a>
                <a class="action" href="../controler/logout.php">Se déconnecter</a>
            </div>
        </div>
        <div class="content">
            <div class='score'>Veuillez choisir une catégorie.</div>
            <?php
            $query = "SELECT * FROM theme";
            $res = $db->query($query)->fetchAll();
            for ($resIndex = 0; $resIndex < count($res); $resIndex++) {
                echo "<form action='qcms.php' method='post'>";
                echo "<div class='form-element'> ";
                echo "<button type='submit' name='category' value=" . $res[$resIndex]["id"] . ">" . $res[$resIndex]["label"] . "</button>";
                echo "</div>";
                echo "</form>";
            }
            ?>
        </div>
</body>