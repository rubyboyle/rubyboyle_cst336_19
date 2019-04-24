<?php

    include 'inc/dbConnection.php';
    $dbConn = getDatabaseConnection("c9");
   
       
         $sql = "SELECT imageUrl FROM pixabay;";
       
       
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($records);
    
?>