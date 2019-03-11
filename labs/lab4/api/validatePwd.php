<?php
//API to check if the password contains the username in it. Will be invalid if it does.

$password = $_GET['password'];
$confirmpassword = $_GET['confirmpassword'];
//echo $username . "<br>";
//echo $password . "<br>";

$data = array();

if (stripos($password, $confirmpassword) !== false) {
   // echo "Username is included in password!";
    $data["validPwd"] = false;
} else {
   // echo "Username is NOT included in password!";
   $data["validPwd"] = true;
}

echo json_encode($data);
?>