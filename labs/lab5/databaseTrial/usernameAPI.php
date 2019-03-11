<?php

include 'dbConnection.php';
$dbConn = startConnection("c9");

    $sql = "SELECT username
            FROM users
            WHERE username = :username";
            
    $stmt = $dbConn -> prepare ($sql);
    $stmt -> execute( array(":username"=>$_GET['username']) );
    $record = $stmt -> fetch(PDO::FETCH_ASSOC);
    
    print_r($record);
    
    echo json_encode($record);


?>
