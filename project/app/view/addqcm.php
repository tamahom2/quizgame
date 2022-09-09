<?php
include "../controler/DB.php";
$db = new DB();
session_start();
if (empty($_SESSION["username"])) {
    header("location:../../public/index.php");
}
$role = $_SESSION["role"];
if ($role == 2) {
    http_response_code(403);
    die('Forbidden');
}
$categories = array();
$query = "SELECT * FROM theme ";
$res = $db->query($query)->fetchAll();
for ($resIndex = 0; $resIndex < count($res); $resIndex++) {
    array_push($categories, $res[$resIndex]["label"]);
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
                Ajout des qcm
            </div>
            <div class="header-menu">
                <a class="action" href="dashboard.php">Dashboard</a>
                <a class="action" href="../../public/index.php">Accueil</a>
                <a class="action" href="changepassword.php">Changer le mot de passe</a>
                <a class="action" href="../controler/logout.php">Se déconnecter</a>
            </div>
        </div>
        <div class="content">
            <form action="../controler/addqcm.php" method="POST">
                <div class="form-element">
                    <label for="Theme">Theme:</label>
                    <select name="Theme" size="1">
                        <?php
                        for ($i = 0; $i < count($categories); $i++) {
                            echo "<option value=" . $categories[$i] . ">" . $categories[$i] . "</option>";
                        }
                        ?>
                    </select><br><br>
                </div>
                <div class="form-element">
                    <label for="QCM">Nom Qcm:</label>
                    <input type="text" placeholder="Nom QCM" name="QCM"><br><br>
                </div>
                <div class="form-element">
                    <label for="Nbre">Nombre de questions:</label>
                    <input type="number" placeholder="Nombre de question" name="Nbre"><br><br>
                </div>
                <div class="form-element">
                    <input type="submit" value="Ajouter">
                </div>
            </form>
        </div>
</body>

</html>