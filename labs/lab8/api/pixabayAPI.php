<?php
$keyword = $_GET['keyword'];

$curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => "https://pixabay.com/api/?key=5589438-47a0bca778bf23fc2e8c5bf3e&q=$keyword&image_type=photo&orientation=$orientation&safesearch=true&per_page=100",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
      "cache-control: no-cache"
      ),
   ));

$jsonData = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);


$data = json_decode($jsonData, true); 


$imageURLs = array();

for ($i = 0; $i < 50; $i++) {

  $imageURLs[] = $data["hits"][$i]["webformatURL"];
  
}

shuffle($imageURLs);

echo json_encode(array_slice($imageURLs, 0, 9)); 
?>