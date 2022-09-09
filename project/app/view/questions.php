<?php
include("../controler/DB.php");
session_start();
$db = new DB();
$fk =  $_POST["qcm"];
$_SESSION["idqcm"] = $fk;
$query = "SELECT * FROM qcm WHERE id='$fk'";
$res = $db->query($query)->fetchArray();
$userId = $res["fk_user_id"];
$query = "SELECT * FROM users WHERE id='$userId'";
$username = $db->query($query)->fetchArray();
$username = $username["username"];
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
                Jeu
            </div>
            <div class="header-menu">
                <a class="action" href="dashboard.php">Dashboard</a>
                <a class="action" href="../../public/index.php">Accueil</a>
                <a class="action" href="changepassword.php">Changer le mot de passe</a>
                <a class="action" href="../controler/logout.php">Se déconnecter</a>
            </div>
        </div>
        <div class="content">
            <div class='score'>Créé par: <span><?php echo $username; ?></span></div>
            <form action='score.php' method='post'>
                <?php
                $query = "SELECT * FROM question WHERE fk_qcm_id='$fk'";
                $res = $db->query($query)->fetchAll();
                for ($resIndex = 0; $resIndex < count($res); $resIndex++) : ?>
                    <div class="form-question">
                        <?php
                        echo "<div class='question-corps'>";
                        echo "<div class='question-content'>Question " . ($resIndex + 1) . ": <span>" . $res[$resIndex]["corps"] . "</span></div>";
                        echo "</div>";
                        $fk_question_response = $res[$resIndex]["id"];
                        $query2 = "SELECT * FROM reponse WHERE fk_question_id='$fk_question_response'";
                        $responses = $db->query($query2)->fetchAll(); ?>
                        <?php for ($responseIndex = 0; $responseIndex < count($responses); $responseIndex++) : ?>
                            <?php
                            echo "<div class='question-response'>";
                            echo "<div class='question'>" . $responses[$responseIndex]["label"] . "</div>";
                            echo "<input type='checkbox' name='userAnswer[" . $responses[$responseIndex]["id"] . "]'>";
                            echo "</div>";
                            ?>
                        <?php endfor; ?>
                    </div>
                <?php endfor; ?>
                <div class="form-element">
                    <input type="submit" value="Check score">
                </div>
            </form>
        </div>
</body>