<?php
session_start();
//TODO: Save incoming data into session

if(!isset($_SESSION["progress"])){
    $_SESSION["progress"] = 0;
}

echo json_encode($_SESSION)
?>