<?php

//receives these parameters: action, url, keyword
 include 'inc/dbConnection.php';
 $dbConn = getDatabaseConnection("c9");

 $action = $_GET['action'];

 $np = array();
 
  switch ($action) {
        
        case "add":    $sql = "INSERT INTO pixabay (keyword,imageId,imageUrl,favorite)
                               VALUES (:keyword,:imageId,:imageUrl,'1')";
                       $np[':keyword'] = $_GET['keyword'];
                       $np[':favorite'] = $_GET['favorite'];
                       $np[':imageId'] = $_POST['imageId'];
                       $np[':imageUrl'] = $_POST['imageUrl'];
                       break;
        // case "delete":  $sql = "DELETE FROM pixabay WHERE imageURL = :favorite";
        //                 $np[':favorite'] = $_GET['favorite'];
        //                 break;
        // case "keyword": "SELECT image_id FROM images WHERE 1 ";
        //                 break;
        // case "favorites":   $sql="SELECT imageId, imageUrl, favorite FROM pixabay ORDER BY imageId";
        //                 break;
                        
    }//switch


    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    
?>