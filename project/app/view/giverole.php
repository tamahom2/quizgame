<?php
session_start();
$role = $_SESSION["role"];
if (empty($_SESSION["username"])) {
    header("location:signup.php");
}
if ($role > 0) {
    http_response_code(403);
    die('Forbidden');
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title> Rôle </title>
    <link rel="stylesheet" type="text/css" href="../../public/css/errors.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/main.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header-label">
                Donner le rôle
            </div>
            <div class="header-menu">
                <a class="action" href="dashboard.php">Dashboard</a>
                <a class="action" href="../../public/index.php">Accueil</a>
                <a class="action" href="changepassword.php">Changer le mot de passe</a>
                <a class="action" href="../controler/logout.php">Se déconnecter</a>
            </div>
        </div>
        <div class="content">

            <form action="../controler/giverole.php" method="POST">
                <div class="form-element">
                    <label for="Username">Pseudo :</label>
                    <input type="text" placeholder="Enter Username" name="Username"><br><br>
                </div>
                <div class="form-element">
                    <label for="Role">Rôle:</label>
                    <select name="Role" size="1">
                        <option value="2">Utilisateur</option>
                        <option value="1">Rédacteur</option>
                    </select><br><br>
                </div>
                <div class="form-element">
                    <input type="submit" value="Donner">
                </div>
            </form>
        </div>
</body>