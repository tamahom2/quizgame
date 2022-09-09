<?php
include("../controler/DB.php");
session_start();
$db = new DB();
$role = $_POST["Role"];
$username = mysqli_real_escape_string($db->getConn(),$_POST["Username"]);
$query = "UPDATE users set role='$role' where username='$username'";
$res = $db->query($query);
header("location:../view/dashboard.php");
