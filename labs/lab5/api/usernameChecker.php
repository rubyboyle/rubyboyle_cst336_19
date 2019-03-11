<?php
//API to check an array of usernames to the user's input to make sure it's not already taken.
$usernames = array("ruby", "boyle", "rubyboyle", "rboyle", "rubyb");
$username = array();

if(in_array(strtolower($_GET['username']), $usernames)) {
    $username['available'] = false;
} else {
    $username['available'] = true;
}

echo json_encode($username);
?>