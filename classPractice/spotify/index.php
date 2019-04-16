<?php

//API KEY
$apiKey = "BQASY65_qfg8R6jpmZsWVHyq69TIVSyAnVkDDuLuqtHeJzdMuEuOy0t04nWFVIz3BewnXy-Kp4KPccBBUc7ZyGXXzVnOPIocFWGgzC-4H4-COldp33zpmNfZvSGFgz6yxxj_CSKY0nMKQQ";

// Setup the CURL session
$cSession = curl_init();

// Setup the CURL options
curl_setopt($cSession,CURLOPT_URL,"https://api.spotify.com/v1/browse/featured-playlists");
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false);

// Add headers to the HTTP command
curl_setopt($cSession,CURLOPT_HTTPHEADER, array(
    "Accept: application/json",
    "Content-Type: application/json",
    "Authorization: Bearer $apiKey"
));

// Execute the CURL command
$results = curl_exec($cSession);

// Check for specific non-zero error numbers
$errno = curl_errno($cSession);
if ($errno) {
    switch ($errno) {
        default:
            echo "Error #$errno...execution halted";
            break;
    }

    // Close the session and exit
    curl_close($cSession);
    exit();
}

// Close the session
curl_close($cSession);

// Convert the results to an associative array
$musicData = json_decode($results);

// Let's just get one of the items and echo the JSON for that only.
echo json_encode($musicData->playlists->items[0]);

?>