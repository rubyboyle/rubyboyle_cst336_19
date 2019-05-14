<?php
  //check whether errorArray is set, if so, display items.
  session_start();

if (isset($_POST['loginForm'])) {  //login form has been submitted
  include 'inc/db-connection.php';
  $dbConn = startConnection("final_scheduler");

    $sql = "SELECT * FROM user " .
           "WHERE username = '" . $_POST['username'] . "' " .
           "AND password = '" .  $_POST['password'] . "'";

     $stmt = $dbConn->query($sql);
     $record = $stmt->fetch();

  if (!empty($record)) { //if record with username and password was found
    header("Location: dashboard.php");
  } else {
    $errorArray = array("Wrong username/password");  
  }
} //endIf loginForm was submitted

?>