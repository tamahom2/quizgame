<html>
<?php
session_start();
if(empty($_SESSION["username"])){
    header("location:signup.php");
}
?>
<head>
    <title>Changer le mot de passe</title>
    <link rel="stylesheet" type="text/css" href="../../public/css/errors.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/main.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header-label">
                Changer le mot de passe
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
            if (isset($_SESSION["errorsp"])) {
                $errors = $_SESSION["errorsp"];
                if (!empty($errors) && is_array($errors)) {
                    echo "<div class='errors'>";
                    foreach ($errors as $message) {
                        echo "<div class='error'>";
                        echo $message . "<br/>";
                        echo "</div>";
                    }
                    echo "</div>";
                }
            }
            $_SESSION["errorsp"] = array();
            ?>
            <form action="../controler/changepassword.php" method="post">
                <div class="form-element">
                    <label for="currentPassword">Ancien mot de passe :</label>
                    <input type="password" placeholder="Enter le mot de passe" name="currentPassword"><br><br>
                </div>
                <div class="form-element">
                    <label for="newPassword">Nouveau Mot de Passe : </label>
                    <input type="password" placeholder="Enter nouveau mot de passe" name="newPassword"><br><br>
                </div>
                <div class="form-element">
                    <label for="confirmPassword">Confirmez le mot de passe : </label>
                    <input type="password" placeholder="Confirm Password" name="confirmPassword"><br><br>
                </div>
                <div class="form-element">
                    <input type="submit" value="Chnager">
                </div>
            </form>
        </div>
</body>

</html>