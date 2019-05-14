<?php
// include 'inc/db-connection.php';
// function validateSession(){
//     if (!isset($_SESSION['username'])) {
//         header("Location: index.php");
//         exit;
//     }
// }

function displayAllAppointments(){
    global $dbConn;
    
    // $sql = "SELECT * FROM appointments ORDER BY id";
    $sql = "SELECT * FROM appointments WHERE date >= CURDATE(); ORDER BY id";
   
    // created >= today;
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 

        echo "<table>";
        echo "<tr>";
        echo "<th>Date</th>"; 
        echo "<th>Start Time</th>";
        echo "<th>Duration</th>";
        echo "<th>Booked By</th>"; 
        echo "</tr>";
    // foreach ($records as $record) {

        echo "<tr>"; 
        echo "<td id = 'date-column'>".$record['date']."</td>";
        echo "<td id = 'start-column'>".$record['start_time']."</td>";
        echo "<td id = 'duration-column'>".$record['end_time']."</td>";
        echo "<td id = 'booked-column'>".$record['booked_by']."</td>";
        
        // echo "<a onclick='openModal()' target='productModal' href='productInfo.php?productId=".$record['productId']."'>".$record['productName']."</a>]  ";

        echo "<td id = 'details-column'><a onclick='openModal()' target='productModal' class='btn btn-primary' role='button' href='php/appointment-info.php?productId=".$record['id']."'>Details</a></td>";
        echo "<td id = 'details-column'><form action='inc/delete-appointment.php' onsubmit='return confirmDelete()'>";
        echo "   <input type='hidden' name='id' value='".$record['id']."'>";
        echo "   <button class='btn btn-outline-danger' type='submit'>Delete</button>";
        echo "</form></td>";
        echo "</tr>";
    // }
        echo "</table>";
}


function getProductInfo($productId) {
    global $dbConn;
    
    $sql = "SELECT * FROM appointments WHERE id = $productId";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);   
    
    return $record;
     
    
}

?>