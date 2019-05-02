<?php

    // function getDatabaseConnection($dbName) {
    
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbName     = "c9";
        
        //checks whether the URL contains "herokuapp" (using Heroku)
        // if(strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        //   $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        //   $host = $url["host"];
        //   $dbName = substr($url["path"], 1);
        //   $username = $url["user"];
        //   $password = $url["pass"];
        // }
        
        // $dbConn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
        // $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        
        // return $dbConn;
        // // Create database connection
        
        $db = new mysqli($host, $username, $password, $dbName);
        
        // Check connection
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

    
    // }
    
 
    // Database configuration
    // $dbHost     = "localhost";
    // $dbUsername = "root";
    // $dbPassword = "";
    // $dbName     = "c9";
    
    // // Create database connection
    // $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
    // // Check connection
    // if ($db->connect_error) {
    //     die("Connection failed: " . $db->connect_error);
    // }

?>