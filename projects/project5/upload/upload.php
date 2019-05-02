<?php 

$file_ary = reArrayFiles($_FILES['fileName']);

$results = null;

try {
    foreach ($file_ary as $file) {
        if ($file["error"] > 0) {
          //echo "Error: " . $file["error"] . "<br>";
        }
        else {
            include 'dbConn.php';
            
            $binaryData = file_get_contents($file["tmp_name"]);
            $sql = "INSERT INTO bit_storage (name, content_type, bits ) " .
                " VALUES (:fileName, :fileType, :fileData) ";
            $stmt = $dbConn->prepare($sql);
            $stmt->execute(array (":fileName"=>$file["name"],
                           ":fileType"=>$file["type"],
                           ":fileData"=>$binaryData));
        }  
    }

    $results = array("status" => 0, "message" => "");

} catch (Exception $ex) {
    $results = array("status" => $ex->getCode(), "message" => "Caught exception: " . $e->getMessage());
}

header("Content-Type: application/json");
    
echo json_encode($results);

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
