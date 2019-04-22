<?php

// $backgroundImage = "img/sea.jpg";

if (isset($_GET["keyword"])) {  //checks if the form has been submitted

    include "api/pixabayAPI.php";

    $keyword = $_GET["keyword"];
    
    if (!empty($_GET['category'])) { //user selected a category
        
        $keyword = $_GET['category'];
        
    }
    
    
    echo "You searched for:  $keyword";
    

   $imageURLs = getImageURLs($keyword, $_GET["layout"]);
   //print_r($imageURLs);
   //shuffle($imageURLs);

//   $backgroundImage = $imageURLs[array_rand($imageURLs)];
  
}

function formIsValid() {
    
    if (empty($_GET['keyword']) && empty($_GET['category'])) {
        echo "<h1> ERROR!!! You must type a keyword or select a category</h1>";
        return false;
    }
    return true;
            
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Pixabay API </title>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <style>
      
            #carouselExampleIndicators{
                 width:500px;
                 margin:0 auto; 
            }
            
        </style>
    </head>
    <body>
        <form method="GET">
            <input type="text" name="keyword" placeholder="Search" value="<?=$_GET['keyword']?>" />
            <div class="after"></div>
            <input type="submit" name="submitBtn"/>
        </form>
            <h4>&nbsp;</h4>
            <p>Click search, Enter to submit</p>
            

        <?php 
        if (isset($imageURLs) &&  formIsValid() ) { ?>
        
           <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <?php
                  for ($i=1; $i < 9; $i++) { 
                    echo "<li data-target='#carouselExampleIndicators' data-slide-to='$i'></li>";
                  }
                 ?>
              </ol>
              <div class="carousel-inner">
                <?php
                  for ($i = 0; $i < 9; $i++) {
                      do {
                       $randomIndex = array_rand($imageURLs);  // rand(0, count($imageURLs)-1);
                      }
                      while (!isset($imageURLs[$randomIndex]));
                      echo "<div class=\"carousel-item ";
                      echo ($i == 0)?" active ":"";
                      echo "\">";
                      echo "<img class=\"d-block w-100\" src=\"".$imageURLs[$randomIndex]."\" alt=\"Second slide\">";
                      echo "</div>";
                      unset($imageURLs[$randomIndex]);
                  }
                 ?>
              </div>
 
            </div>
        
        <?php
         } //closing if isset($imageURLs)

        ?>

       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
       <script src="functions.js"></script>
    </body>
</html>