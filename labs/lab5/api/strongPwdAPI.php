<?php
//API to randomize numbers and letters for the suggested password
$pwdLength = $_GET['length'];
$lettersArray = range("a","z");
$password = "";

for ($i = 0; $i < $pwdLength; $i++) {
    $randomIndex = rand(0,25);
    $password = $password . $lettersArray[$randomIndex ]; 
}

$password[0] = rand(0,9);
$password = str_shuffle($password); 

$data = array();
$data["suggestedPwd"] = $password;

echo json_encode($data);

?>

