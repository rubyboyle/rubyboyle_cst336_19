<?php
    $host = "localhost";
    $dbname = "just_bits";
    $username = "root";
    $password = "";

    // Get Data from DB
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
?>