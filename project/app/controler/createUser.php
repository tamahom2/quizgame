<?php
include "DB.php";
include "..\model\User.php";
include "isvalid.php";
$db = new DB();
$user = $_POST["Username"];
$email = $_POST["Email"];
$cemail = $_POST["CEmail"];
$password = $_POST["Password"];
$confirmpass = $_POST["Confirm"];
$errors = array();

$usercheck = $db->query("SELECT * FROM `users` WHERE username='$user'")->numRows();
$emailcheck = $db->query("SELECT * FROM `users` WHERE email='$email'")->numRows();
if ($usercheck >= 1) {
    array_push($errors, 'Pseudo déjà utilisé.');
}
if ($emailcheck >= 1) {
    array_push($errors, 'Email déjà utilisé.');
}
if (!isValidUsername($user)) {
    array_push($errors, "Pseudo n'est pas valide.");
}
if (!isValidEmail($email)) {
    array_push($errors, "Email n'est pas valide.");
}
if ($email != $cemail) {
    array_push($errors, 'Les Emails sont différents.');
}
if (!isValidPassword($password)) {
    array_push($errors, 'Votre mot de passe doit contenir au moins 8 caractères et une lettre majuscule, un chiffre, et un caractère spécial.');
}
if ($password != $confirmpass) {
    array_push($errors, 'Les mots de passe sont différents.');
}
if (count($errors) == 0) {
    $password = password_hash($password, PASSWORD_BCRYPT); //using Bcrypt to hash passwords instead of MD5 because it's vulnerable
    $args = array(
        mysqli_real_escape_string($db->getConn(), $user),
        mysqli_real_escape_string($db->getConn(), $email),
        mysqli_real_escape_string($db->getConn(), $password)
    );
    $query = vsprintf("INSERT INTO users (username, email, role, password) VALUES ('%s', '%s', 2, '%s')", $args);
    $createAccount = $db->query($query);
    header("location:../view/login.php");
} else { //TO DO DISPLAYING ERRORS IN THE SIGNUP PAGE
    session_start();
    $_SESSION["errors"] = $errors;
    header("location:../view/signup.php");
}
