<!DOCTYPE html>
<html>
    <head>
        <title> </title>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>

        <h1> Favorite Images </h1>
        
        <table id="results">
            <th></th>
            <th></th>
            <th></th>
        </table>
        
        <script>
    /*global $*/
     $(document).ready(function(){
       $.ajax({
            type:"GET",
            url: "api/favs.php",
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