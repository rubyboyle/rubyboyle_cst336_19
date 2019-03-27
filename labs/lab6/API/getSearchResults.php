<?php
include 'inc/dbConnection.php';
$conn = getDatabaseConnection("ottermart");
$namedParameters = array();
$sql = "SELECT * FROM om_product WHERE 1"; //Retrieves ALL records

if (!empty($_GET['product'])) { //user entered a product keyword
    $sql .=  " AND productName LIKE :productName";
    $namedParameters[":productName"] = "%" . $_GET['product'] . "%";
}

if (!empty($_GET['category'])) { //user entered a product keyword
    $sql .=  " AND catId = :categoryId";
    $namedParameters[":categoryId"] =  $_GET['category'];
}

if (!empty($_GET['priceFrom'])) { //user entered a product keyword
    $sql .=  " AND price >= :priceFrom";
    $namedParameters[":priceFrom"] =  $_GET['priceFrom'];
}

if (!empty($_GET['priceTo'])) { //user entered a product keyword
    $sql .=  " AND price <= :priceTo";
    $namedParameters[":priceTo"] =  $_GET['priceTo'];
}

if (isset($_GET['orderBy'])) {
    if($_GET['orderBy'] == "price"){
        $sql .=  " ORDER BY price";
    } else if($_GET['orderBy'] == "name") {
         $sql .=  " ORDER BY productName";
    }
}

$stmt = $conn -> prepare($sql); 
$stmt->execute($namedParameters);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
echo json_encode($records);

?>