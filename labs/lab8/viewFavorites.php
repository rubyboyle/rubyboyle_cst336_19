<!DOCTYPE html>
<html>
    <head>
        <title>Favorite Images</title>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
         <link rel="stylesheet" href="css/styles.css" type="text/css" />
    </head>
    <body>

        <h1> Favorite Images </h1>
        
        <table id="results">
  
        </table>
        
        <a href="index.php" class="cta">
        	<span>Back to Search</span>
        	<svg width="13px" height="10px" viewBox="0 0 13 10">
                <path d="M1,5 L11,5"></path>
                <polyline points="8 1 12 5 8 9"></polyline>
            </svg>
        </a>
        <script>
    /*global $*/
     $(document).ready(function(){
       $.ajax({
            type:"GET",
            url: "api/getFavorites.php",
            dataType: "json",
            success:function(data,status){
                data.forEach(function(key){
                   $("#results").append("<td><img src='" + key['imageUrl'] + "' width='200' height='200'/><br>");
                });
            }
       }); 
    });
            
            
            
            
        </script>
        
    </body>
</html>