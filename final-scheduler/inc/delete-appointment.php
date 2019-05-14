<?php
// session_start();
include 'db-connection.php';
$dbConn = startConnection("final_scheduler");
include 'functions.php';
// validateSession();
$sql = "DELETE FROM appointments WHERE id = " . $_GET['id'];

$stmt=$dbConn->prepare($sql);
$stmt->execute();

header("Location: ../dashboard.php");



?>