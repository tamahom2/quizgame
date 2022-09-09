<?php
session_start();
$role = $_SESSION["role"];
if (empty($_SESSION["username"])) {
    header("location:signup.php");
}
if ($role == 2) {
    http_response_code(403);
    die('Forbidden');
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
                Ajout des questions
            </div>
            <div class="header-menu">
                <a class="action" href="dashboard.php">Dashboard</a>
                <a class="action" href="../../public/index.php">Accueil</a>
                <a class="action" href="changepassword.php">Changer le mot de passe</a>
                <a class="action" href="../controler/logout.php" class="waves-effect waves-light btn">Se déconnecter</a>
            </div>
        </div>
        <div class="content">
            <form id="create-questions" action="../controler/addquestions.php" method="POST">
                <?php
                $Nbre = $_SESSION["Nbre"];
                $letters = ['A', 'B', 'C', 'D'];
                ?>
                <?php for ($questionIndex = 0; $questionIndex < $Nbre; $questionIndex++) : ?>
                    <div class="form-question">
                        <div class="question-corps">
                            <label for="questionId"><?php echo "Question " . ($questionIndex + 1) . " :" ?></label>
                            <input type="text" required placeholder="Question" name=<?php echo "questions[" . $questionIndex . "]['question']" ?>>
                        </div>
                        <?php for ($resposeIndex = 0; $resposeIndex < 4; $resposeIndex++) : ?>
                            <div class="question-response">
                                <label for=<?php echo "reponse-" . $questionIndex . "-" . $resposeIndex ?>></label>
                                <input type="text" required name=<?php echo "questions[" . $questionIndex . "]['responses'][" . $resposeIndex . "]" ?> placeholder=<?php echo "Réponse " . $letters[$resposeIndex] ?> name="' + responseId + '">
                                <input type="checkbox" name=<?php echo "questions[" . $questionIndex . "]['responses-check'][" . $resposeIndex . "]" ?>>
                            </div>
                        <?php endfor; ?>
                    </div>
                <?php endfor; ?>
                <div class="form-element alert">
                    Veuillez sélectionner les bonnes réponses avant d'enregistrer
                </div>
                <div class="form-element">
                    <input type="submit" value="Enregister">
                </div>
            </form>
        </div>
</body>

</html>