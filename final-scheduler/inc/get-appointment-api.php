<?php

    include 'db-connection.php';
    $dbConn = startConnection("final_scheduler");
    
    $sql = "SELECT * FROM appointments ORDER BY id";
//WHERE date >= CURDATE();";
    
    $stmt=$dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // print_r($records);
    
    echo json_encode($records);
// $host = "localhost";
// $dbname = "final_scheduler";
// $username = "root";
// $password = "";

// // Establishing a connection
// $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// // Setting Errorhandling to Exception
// $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

// $sql = "SELECT * FROM appointments WHERE date >= CURDATE(); ORDER BY id";
// $stmt = $dbConn -> prepare($sql);  //$connection MUST be previously initialized
// $stmt->execute();
// $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple

// print_r($records); //displays array content

// echo json_encode($records);

//  echo $records[0]['date'];


?>

