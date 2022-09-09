<?php
include("../controler/DB.php");
session_start();
$db = new DB();
$fk =  $_POST["category"];
if (empty($_SESSION["username"])) {
    header("location:signup.php");
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
    <link rel="stylesheet" type="text/css" href="../../public/css/errors.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/main.css">
</head>

<body>
    <meta charset="utf-8">
    <div class="container">
        <div class="header">
            <div class="header-label">
                QCM
            </div>
            <div class="header-menu">
                <a class="action" href="dashboard.php">Dashboard</a>
                <a class="action" href="../../public/index.php">Accueil</a>
                <a class="action" href="changepassword.php">Changer le mot de passe</a>
                <a class="action" href="../controler/logout.php">Se déconnecter</a>
            </div>
        </div>
        <div class="content">
            <?php
            $username = $_SESSION["username"];
            $query = "SELECT * FROM users WHERE username='$username'";
            $res = $db->query($query)->fetchArray();
            $userID = $res["id"];
            $query = "SELECT * FROM qcm WHERE fk_theme_id='$fk'";
            $res = $db->query($query)->fetchAll();
            for ($resIndex = 0; $resIndex < count($res); $resIndex++) {
                $fkqcm = $res[$resIndex]["id"];
                $query = "SELECT * FROM score WHERE fk_user_id='$userID' AND fk_qcm_id='$fkqcm'";
                $res1 = $db->query($query)->fetchArray();
                if (empty($res1["score"])) {
                    $score = "-";
                } else {
                    $score = $res1["score"];
                }
                echo "<div class='score'>Votre meilleur score dans ce QCM: <span>$score</span></div>";
                echo "<form action='questions.php' method='post' style='margin-bottom: 4rem;'>";
                echo "<div class='form-element'>";
                echo "<button type='submit' name='qcm' value=" . $res[$resIndex]["id"] . ">" . $res[$resIndex]["label"] . "</button>";
                echo "</div>";
                echo "</form>";
            }
            ?>

</body>