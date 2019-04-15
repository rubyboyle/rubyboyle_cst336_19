<?php
    include 'inc/dbConnection.php';
    $conn = getDatabaseConnection("cinder");
    
    $sql = "SELECT * FROM user ORDER BY username";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($records[rand(0,20)]);
?>