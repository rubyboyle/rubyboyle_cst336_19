<?php

session_start();
$conn = getDBConnection();

// TODO: Grab all of our paramters from the session
$parameters[":name"]= $_SESSION["name"];

// TODO: Execute SQL to add a row to database table
$sql=

// Destory the session once you submit
session_destroy();

// TODO: Return all the rows from the datable table

?>
