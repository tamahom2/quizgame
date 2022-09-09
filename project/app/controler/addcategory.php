<?php
include("DB.php");
session_start();
$db = new DB();
$name = $_POST["category"];
$query = "INSERT INTO theme (label) VALUES(\"$name\")";
$res = $db->query($query);
header("location:../view/dashboard.php");
