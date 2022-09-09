<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title> Sign UP </title>
    <link rel="stylesheet" type="text/css" href="../../public/css/errors.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/main.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header-label">
                S'enregistrer
            </div>
            <div class="header-menu">
                <a class="action" href="../../public/index.php">Accueil</a>
            </div>
        </div>
        <div class="content">
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            header("location:dashboard.php");
        }
        if (isset($_SESSION["errors"])) {
            $errors = $_SESSION["errors"];
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
        $_SESSION["errors"] = array();
        ?>
        <form action="../controler/createUser.php" method="post">
            <div class="form-element">
                <label for="Username">Pseudo :</label>
                <input type="text" placeholder="Enter Username" name="Username"><br><br>
            </div>
            <div class="form-element">
                <label for="Email">Email:</label>
                <input type="text" placeholder="Enter Email" name="Email"><br><br>
            </div>
            <div class="form-element">
                <label for="CEmail">Confirmez l'email :</label>
                <input type="text" placeholder="Confirm Email" name="CEmail"><br><br>
            </div>
            <div class="form-element">
                <label for="Password">Mot de Passe : </label>
                <input type="password" placeholder="Enter Password" name="Password"><br><br>
            </div>
            <div class="form-element">
                <label for="Confirm">Confirmez le mot de passe : </label>
                <input type="password" placeholder="Confirm Password" name="Confirm"><br><br>
            </div>
            <div class="form-element">
                <input type="submit" value="S'enregistrer">
            </div>
            <div class="form-element">
                <a href="login.php">Vous êtes déjà un membre?</a>
            </div>
        </form>
    </div>
</body>

</html>