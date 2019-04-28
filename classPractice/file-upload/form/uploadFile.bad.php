<?php 
// http://php.net/manual/en/features.file-upload.multiple.php

if (isset($_POST['uploadForm'])) {
    
    for ($i = 0; $i < count($_FILES["fileName"]["error"]); $i++) {
        if ($_FILES["error"] > 0) {
          echo "Error: " . $_FILES["fileName"]["error"][$i] . "<br>";
        }
        else {
          echo "Upload: " . $_FILES["fileName"]["name"][$i] . "<br>";
          echo "Type: " . $_FILES["fileName"]["type"][$i] . "<br>";
          echo "Size: " . ($_FILES["fileName"]["size"][$i] / 1024) . " KB<br>";
          echo "Stored in: " . $_FILES["fileName"]["tmp_name"][$i] . "<br><br>";
        }  
        // print 'File Name: ' . $file['name'];
        // print 'File Type: ' . $file['type'];
        // print 'File Size: ' . $file['size'];
    }
    
} //endIf form submission
?>

