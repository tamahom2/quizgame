<?php
include "DB.php";
include "isvalid.php";
session_start();
$db = new DB();
$errors = array();
$user = $_SESSION["username"];
$currentPassword = $_POST["currentPassword"];
$newPassword = $_POST["newPassword"];
$confirmPassword = $_POST["confirmPassword"];
$query = "SELECT * FROM users WHERE username ='$user'";
$res = $db->query($query)->fetchArray();
if (!isValidPassword($newPassword)) {
    array_push($errors, 'Votre mot de passe doit contenir au moins 8 caractères et une lettre majuscule, un chiffre, et un caractère spécial.');
} else {
    if (password_verify($currentPassword, $res["password"])) {
        if ($newPassword == $confirmPassword) {
            $newPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            $query = "UPDATE users set password='$newPassword' where username='$user'";
            $res = $db->query($query);
            header("location:../view/dashboard.php");
        } else {
            array_push($errors, "Les mots de passe sont différents.");
        }
    } else {
        array_push($errors, "Mot de passe incorrect.");
    }
}
$_SESSION["errorsp"] = $errors;
header("location:../view/changepassword.php");
