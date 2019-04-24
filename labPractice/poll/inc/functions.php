<?php

include 'dbConnection.php';

function updatePoll() {
    $db = getDatabaseConnection();
    
    $choice = $_GET['userChoice'];
    $pollId = $_GET['pollId'];
    $stmt = $db->prepare("UPDATE poll_response SET $choice = $choice + 1 WHERE pollId = :pollId");
    $stmt -> execute(array(":pollId=>$pollId"));
    $stmt = $db->prepare("SELECT * FROM poll_response WHERE pollId =:pollId");
    $stmt -> execute(array(":pollId=>$pollId"));  
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo json_encode($record);
}

if (isset($_GET['userChoice'])) {
    updatePoll();
}
?>