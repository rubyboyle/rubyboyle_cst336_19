<?php
    include 'inc/dbConnection.php';
    $conn = getDatabaseConnection("midterm");
    
    $sql = "SELECT * FROM mp_product ORDER BY productName";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($records[rand(0,18)]);
?>