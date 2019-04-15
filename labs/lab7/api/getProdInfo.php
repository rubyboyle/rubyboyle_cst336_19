<?php
//dont need this FILE
    include 'api/inc/dbConnection.php';
    $conn = getDatabaseConnection("ottermart");
    $sql = "SELECT * FROM om_product";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records
?>