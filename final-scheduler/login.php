<?php

  //check whether errorArray is set, if so, display items.
  session_start();

if (isset($_POST['loginForm'])) {  //login form has been submitted
  include 'inc/db-connection.php';
  $dbConn = startConnection("final_scheduler");

    $sql = "SELECT * FROM user " .
           "WHERE username = '" . $_POST['username'] . "' " .
           "AND password = '" . hash("sha1", $_POST['password']) . "'";

     $stmt = $dbConn->query($sql);
     $record = $stmt->fetch();

  if (!empty($record)) { //if record with username and password was found
    header("Location: dashboard.php");
  } else {
    $errorArray = array("Wrong username/password");  
  }
} //endIf loginForm was submitted

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login </title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <h1>Welcome to Scheduler Login</h1>
    <form method="POST">
      Username: <input type="text" name="username" /> <br />
      Password: <input type="password" name="password"  />
      <input type="submit" name="loginForm" />
    </form>
    </body>
</html>

