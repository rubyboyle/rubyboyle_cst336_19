<?php 
require __DIR__ . '../../../vendor/autoload.php';

$log = new Monolog\Logger('testing-monolog');
$log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::WARNING));
$log->addInfo('I am inside the upload file form stuff');

// http://php.net/manual/en/features.file-upload.multiple.php

if (isset($_POST['uploadForm'])) {
    
    $file_ary = reArrayFiles($_FILES['fileName']);

    foreach ($file_ary as $file) {
        if ($file["error"] > 0) {
          echo "Error: " . $file["error"] . "<br>";
        }
        else {
          echo "Upload: " . $file["name"] . "<br>";
          echo "Type: " . $file["type"] . "<br>";
          echo "Size: " . ($file["size"] / 1024) . " KB<br>";
          echo "Stored in: " . $file["tmp_name"] . "<br><br>";
        }  
        // print 'File Name: ' . $file['name'];
        // print 'File Type: ' . $file['type'];
        // print 'File Size: ' . $file['size'];
    }
    
} //endIf form submission

function reArrayFiles(&$file_post) {
    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}
?>

