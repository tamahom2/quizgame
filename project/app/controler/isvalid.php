<?php
function isValidUsername($username)
{
    return !(strlen($username) < 3 || strlen($username) > 20 || ctype_digit($username));
}
function isValidEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function isValidPassword($password)
{
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    return ($uppercase && $lowercase && $number && $specialChars && strlen($password) >= 8);
}
