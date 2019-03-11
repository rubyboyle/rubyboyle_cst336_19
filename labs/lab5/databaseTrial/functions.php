<?php
include '../../inc/dbConnection.php';
$dbConn = startConnection("c9");

$sql = "SELECT username
        FROM users
        WHERE username = :username";
        
$statement = $conn->prepare($sql);
$statement->execute(array(":username"=> $_GET['username']));

$result = $statement->fetch(PDO::FETCH_ASSOC);

print_r($result);


?>