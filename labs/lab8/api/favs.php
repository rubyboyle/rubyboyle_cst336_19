<?php

//receives these parameters: action, url, keyword
 include 'inc/dbConnection.php';
 $dbConn = getDatabaseConnection("c9");

 $action = $_GET['action'];

// $np = array();
 
  switch ($action) {

       case "add":    
       if(isset($_GET['favorite'])) {
         $imgUrl = $_GET['favorite'];
         
         $sql = "INSERT INTO pixabay(imageId, imageUrl, favorite, keyword) VALUES ('','$imgUrl','','');";
         
       }
       break;
       
        case "delete":  
         if(isset($_GET['favorite'])) {
         $imgUrl = $_GET['favorite'];
         
         $sql = "DELETE FROM pixabay WHERE imageUrl ='$imgUrl';";
         
       }  
         break;
         
         
         // $sql = "DELETE FROM pixabay WHERE imageURL = :favorite";
        //                 $np[':favorite'] = $_GET['favorite'];
        //                 break;
        // case "keyword": "SELECT image_id FROM images WHERE 1 ";
        //                 break;
        // case "favorites":   $sql="SELECT imageId, imageUrl, favorite FROM pixabay ORDER BY imageId";
        //                 break;
                        
   }//switch
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    // $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($records);
    
?>