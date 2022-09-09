<?php
session_start();
$role = $_SESSION["role"];
if ($role > 0) {
    http_response_code(403);
    die('Forbidden');
}
if (empty($_SESSION["username"])) {
    header("location:signup.php");
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title> QCM </title>
    <link rel="stylesheet" type="text/css" href="../../public/css/errors.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/main.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header-label">
                Nouvelle catregorie
            </div>
            <div class="header-menu">
                <a class="action" href="dashboard.php">Dashboard</a>
                <a class="action" href="../../public/index.php">Accueil</a>
                <a class="action" href="changepassword.php">Changer le mot de passe</a>
                <a class="action" href="../controler/logout.php" class="waves-effect waves-light btn">Se déconnecter</a>
            </div>
        </div>
        <div class="content">
            <form action="../controler/addcategory.php" method="POST">
                <div class="form-element">
                    <label for="category">Add category :</label>
                    <input type="text" placeholder="Category" name="category"><br><br>
                </div>
                <div class="form-element">
                    <input type="submit" value="Add">
                </div>
            </form>
</body>

</html>