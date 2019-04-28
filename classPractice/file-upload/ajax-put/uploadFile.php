<?php 
    /* PUT data comes in on the stdin stream */
    $putdata = fopen("php://input", "r");
    
    /* Open a file for writing */
    $fp = fopen("myputfile.ext", "w");
    
    /* Read the data 1 KB at a time
       and write to the file */
    $binary = '';
    while ($data = fread($putdata, 1024)) {
      fwrite($fp, $data);
      $binary .= $data;
    }
    
    /* Close the streams */
    fclose($fp);
    fclose($putdata);

    // You are at the point of file_get_contents when using $_FILES 
    // $binary has the file binary
    // The file part of the example is UNNECESSARY but there for your 
    // reference, only
    
    // This is unnecessary as well, just for our testing purposes
    echo mb_strlen($binary, '8bit')

?>

