<?php

 include 'dbConn.php';

 $sql = "SELECT bits, content_type FROM bit_storage WHERE id = :id";
 $stmt = $dbConn->prepare($sql);
 $stmt->execute( array(":id"=> $_GET['id']));

 $stmt->bindColumn('bits', $data, PDO::PARAM_LOB);
 $record = $stmt->fetch(PDO::FETCH_BOUND);

 if (!empty($record)){
    header('Content-Type:' . $record['content_type']);   //specifies the mime type
    header('Content-Disposition: inline;');
    echo $data;
  }
?>
