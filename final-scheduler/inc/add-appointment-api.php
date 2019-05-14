<?php
// session_start();

include 'db-connection.php';
$dbConn = startConnection("final_scheduler");
// include 'functions.php';
// validateSession();

if (isset($_GET['addAppointment'])) { //checks whether the form was submitted
    
    $date = $_GET['date'];
    $start_time =  $_GET['start_time'];
    $end_time =  $_GET['end_time'];
    $booked_by =  $_GET['booked_by'];
    
    $sql = "INSERT INTO appointments (date, start_time, end_time, booked_by) 
            VALUES (:date, :start_time, :end_time, :booked_by);";
            
    $np = array();
    $np[":date"] = $date;
    $np[":start_time"] = $start_time;
    $np[":end_time"] = $end_time;
    $np[":booked_by"] = $booked_by;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    echo "New Appointment was added!";
    
}

?>
<!--<!DOCTYPE html>-->
<!--<html>-->
<!--    <head>-->
<!--        <title> Admin Section: Add New Product </title>-->
<!--          <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
<!--          <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>-->
<!--          <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<!--          <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
<!--          <link rel="stylesheet" href="/resources/demos/style.css">-->
<!--          <script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
<!--          <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->

        <!--<link rel="stylesheet" href="styles.css">-->
<!--    </head>-->

<!--    <body>-->
        
<!--        <h1> Adding New Appointment </h1>-->
        
<!--        <form>-->
           
<!--           <p>Date: <input type="text" id="datepicker" name="date"></p>-->
<!--           <p>Start Time <input type="text" id="timepicker" name="start_time"></p>-->
<!--           <p>End Time <input type="text" id="timepicker" name="end_time"></p>-->
<!--           <p>Booked By <input type="text" name="booked_by"></p>-->
  
<!--           <input type="submit" name="addAppointment" value="Add Appointment">-->
<!--        </form>-->

<!--    </body>-->
<!--</html>-->