<?php
include("DB.php");
session_start();
$db = new DB();
$questions = $_POST["questions"];
$fk_qcm_question = $_SESSION["id"];
$nbr = $_SESSION["Nbre"];
for ($questionsIndex = 0; $questionsIndex < $nbr; $questionsIndex++) {
    $qRA = $questions[$questionsIndex];
    $question = addslashes($qRA["'question'"]);
    $response1 = $qRA["'responses'"][0];
    $answer1 = 0;
    $response2 = $qRA["'responses'"][1];
    $answer2 = 0;
    $response3 = $qRA["'responses'"][2];
    $answer3 = 0;
    $response4 = $qRA["'responses'"][3];
    $answer4 = 0;
    foreach ($qRA["'responses-check'"] as $key => $value) {
        $answeri = 'answer' . ($key+1);
        $$answeri = 1;
    }
    $query0 = "INSERT INTO question (corps,fk_qcm_id) VALUES (\"$question\", \"$fk_qcm_question\")";
    $res0 = $db->query($query0);
    $query1 = "SELECT * FROM `question` WHERE corps=\"$question\"";
    $res1 = $db->query($query1)->fetchArray();
    $fk_question_response = $res1["id"];
    $query2 = "INSERT INTO reponse (label, correct, fk_question_id) VALUES (\"$response1\", \"$answer1\", \"$fk_question_response\")";
    $res2 = $db->query($query2);
    $query3 = "INSERT INTO reponse (label, correct, fk_question_id) VALUES (\"$response2\", \"$answer2\", \"$fk_question_response\")";
    $res3 = $db->query($query3);
    $query4 = "INSERT INTO reponse (label, correct, fk_question_id) VALUES (\"$response3\", \"$answer3\", \"$fk_question_response\")";
    $res4 = $db->query($query4);
    $query5 = "INSERT INTO reponse (label, correct, fk_question_id) VALUES (\"$response4\", \"$answer4\", \"$fk_question_response\")";
    $res5 = $db->query($query5);
}
header("location:../view/dashboard.php");
