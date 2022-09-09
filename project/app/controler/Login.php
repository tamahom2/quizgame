<?php
    include "DB.php";
    session_start();
    $db = new DB();
    $user = mysqli_real_escape_string($db->getConn(),$_POST["Username"]);
    $password = $_POST["Password"];
    $errors = array();
    $query = "SELECT * FROM users WHERE username ='$user'";
    $res = $db->query($query);
    if($res->numRows()==1){
        $res = $res->fetchArray();
        if(password_verify($password,$res["password"])){
            $_SESSION["username"]=$user;
            header("location:../view/dashboard.php");
        }
        else{
            array_push($errors,"Mot de passe incorrect");
        }
    }
    else{
        array_push($errors,"Pseudo incorrect");
    }
    if(count($errors)>0){
        $_SESSION["ERRORS"]=$errors;
        header("location:../view/login.php");
    }
