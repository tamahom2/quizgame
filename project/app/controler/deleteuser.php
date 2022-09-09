<?php
include("DB.php");
session_start();
$db = new DB();
$username = $_POST["delete"];
$query1 = "SELECT * FROM users WHERE username='$username'";
$res1 = $db->query($query1)->fetchArray();
$userId = $res1["id"];
$query2 = "DELETE FROM score WHERE fk_user_id='$userId'";
$res2 = $db->query($query2);
$query3 = "SELECT * FROM qcm WHERE fk_user_id='$userId'";
$res3 = $db->query($query3)->fetchAll();
for ($qcmIndex = 0; $qcmIndex < count($res3); $qcmIndex++) {
    $qcmId = $res3[$qcmIndex]["id"];
    echo $qcmId;
    $query4 = "SELECT * FROM question WHERE fk_qcm_id='$qcmId'";
    $res4 = $db->query($query4)->fetchAll();
    for ($questionIndex = 0; $questionIndex < count($res4); $questionIndex++) {
        $questionId = $res4[$questionIndex]["id"];
        $query5 = "DELETE FROM reponse WHERE fk_question_id='$questionId'";
        $res5 = $db->query($query5);
    }
    $query6 = "DELETE FROM question WHERE fk_qcm_id='$qcmId'";
    $res6 = $db->query($query6);
}
$query7 = "DELETE FROM qcm WHERE fk_user_id='$userId'";
$res7 = $db->query($query7);
$query8 = "DELETE FROM users WHERE username='$username'";
$res8 = $db->query($query8);
header("location:../view/dashboard.php");
