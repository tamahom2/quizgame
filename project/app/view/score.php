<?php
include("../controler/DB.php");
session_start();
if(empty($_SESSION["username"])){
    header("location:signup.php");
}
$db = new DB();
$userAnswers = $_POST["userAnswer"];
$score = 0;
$qcm = $_SESSION["idqcm"];
$username = $_SESSION["username"];
foreach ($userAnswers as $id => $answer) {
    $query = "SELECT * FROM reponse WHERE id='$id'";
    $res = $db->query($query)->fetchArray();
    if ($res['correct'] == 1) {
        $score += 1;
    }
}
$query = "SELECT * FROM users WHERE username='$username'";
$res = $db->query($query)->fetchArray();
$userid = $res["id"];
$query = "SELECT * FROM score WHERE fk_user_id='$userid' AND fk_qcm_id='$qcm'";
$lastRes = $db->query($query)->fetchArray();
if (count($lastRes) == 0) {
    $query1 = "INSERT INTO score (score,fk_user_id,fk_qcm_id) VALUES('$score', '$userid', '$qcm')";
    $res = $db->query($query1);
} elseif ($score > $lastRes["score"]) {
    $query = "UPDATE score set score='$score' where fk_user_id='$userid' AND fk_qcm_id='$qcm'";
    $res = $db->query($query);
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
                Score
            </div>
            <div class="header-menu">
                <a class="action" href="dashboard.php">Dashboard</a>
                <a class="action" href="../../public/index.php">Accueil</a>
                <a class="action" href="changepassword.php">Changer le mot de passe</a>
                <a class="action" href="../controler/logout.php">Se déconnecter</a>
            </div>
        </div>
        <div class="content">
            <div class='score'>Votre score dans ce QCM: <span><?php echo $score; ?></span></div>
            <a class="action" href="categories.php">Jouer encore</a>
            <p></p>
        </div>