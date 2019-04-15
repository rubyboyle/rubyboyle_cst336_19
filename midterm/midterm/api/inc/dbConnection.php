<?php

    function getDatabaseConnection($dbName) {
    
        $host = "localhost";
        $username = "root";
        $password = "";
        
        $dbConn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        
        return $dbConn;
    
    }
?>