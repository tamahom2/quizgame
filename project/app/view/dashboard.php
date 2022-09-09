<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
    <link rel="stylesheet" type="text/css" href="../../public/css/errors.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/main.css">
</head>

<body>
    <?php
    include("../controler/DB.php");
    session_start();
    $db = new DB();
    !isset($_SESSION['username']) ?header("location:signup.php"): null;

    ?>

    <div class="container">
        <div class="header">
            <div class="header-label">
                Dashboard
            </div>
            <div class="header-menu">
                <a class="action" href="dashboard.php">Dashboard</a>
                <a class="action" href="../../public/index.php">Accueil</a>
                <a class="action" href="changepassword.php">Changer le mot de passe</a>
                <a class="action" href="../controler/logout.php">Se déconnecter</a>
            </div>
        </div>
        <div class="content">
            <?php $user = $_SESSION['username'] ?>
            <?php echo "<div class='user'>Bienvenue, " . $user . "</div>"; ?>
            <a class="action" href='categories.php'>Jouer</a>
            <?php
            $username = $_SESSION["username"];
            $query = "SELECT * FROM users WHERE username='$username'";
            $user = $db->query($query)->fetchArray();
            $role = $user["role"];
            if ($role == 0) {
                echo "<a class=\"action\" href='deleteuser.php'>Supprimer un utilisateur</a>";
                echo "<a class=\"action\" href='giverole.php'>Attribuer un rôle à un utilisateur</a>";
                echo "<a class=\"action\" href='addcategory.php'>Ajouter une catégorie</a>";
            }
            if ($role <= 1) {
                echo "<a class=\"action\" href='addqcm.php'>Ajouter un qcm</a>";
            }
            $_SESSION["role"] = $role;
            ?>
        </div>
    </div>
</body>

</html>