<?php
function getProductInfo($productId) {
     global $dbConn;
    
    $sql = "SELECT * FROM om_product WHERE productId = $productId";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting multiple records   
    
    return $record;
     
    
}

?>