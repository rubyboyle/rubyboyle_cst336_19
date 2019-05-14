<?php
// session_start();

include '../inc/db-connection.php';
$dbConn = startConnection("final_scheduler");
include '../inc/functions.php';
// validateSession();

if (isset($_GET['id'])) {

  $productInfo = getProductInfo($_GET['id']);    
 
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Appointment Info </title>
    </head>
    <body>
    
     <?=$productInfo['date']?>
     <?=$productInfo['start_time']?><br>
     <?=$productInfo['end_time']?>
 
    </body>
</html>