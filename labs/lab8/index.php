<!DOCTYPE html>
<html>
    <head>
    <title> Pixabay API Demo </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        body {
            text-align: center;
        }
        
        img {
            border-radius: 20px;
            padding:15px;
        }
        
        .favorite{
            cursor: pointer;
        }
    </style>
<script>
/*global $*/
    function searchImage() {
    
        $("#images").html("Loading...");
        
        $.ajax({
             method: "GET",
                url: "api/pixabayAPI.php",
            dataType: "json",
                data: { "keyword":$("#keyword").val() },
             success: function(data, status) {
               
                let htmlString = "";
                let i = 0;
                $("#images").html("");
                for (let rows=0; rows < 3; rows++) {
                    
                    htmlString += "<div class='row'>";
                    
                    for (let cols=0; cols < 3; cols++) {
                        
                      htmlString +=  "<img class='favorite' src='img/favorite.png' width='30'>";
                      htmlString +=  "<img src='"+ data[i++]+"' width='300' height='280'>";
                        
                    }//for
                    
                    htmlString += "</div>";
                }//for
               $("#images").append(htmlString);
            }
        }); //ajax 
    }//searchImage()
    
    
   $(document).ready(function(){
        
        $("#images").on("click", ".favorite", function(){ 
            
            if ( $(this).attr("src") == "img/favorite.png") {
            
                $(this).attr("src","img/favorite-on.png");
                //add image url to database
                updateFavorites("add",$(this).next().attr("src"));
            } else {
                
                $(this).attr("src","img/favorite.png");
                //remove image url from database
                updateFavorites("delete",$(this).next().attr("src"));
            }
            
        });
    
        function updateFavorites(action,favorite) {
                $.ajax({
                    type: "get",
                    url: "api/favs.php",
                    dataType: "json",
                    data: {
                      "action": action,
                      "favorite": favorite,
                      "keyword": $("#keyword").val()
                    },
                    success: function(data, status) {
                    },
                  });//ajax
            }
    });//documentReady
    
         $(document).on('click','.favorite',function(){
                $.ajax({
                    type:"POST",
                    url:"api/favs.php",
                    dataType: "json",
                    data :{
                        "keyword": $("[name=keyword").val(),
                        "imageId": $(this).attr("id"),
                        "imageUrl": $(this).attr("value"),
                    }
                });
            });

</script>
<link rel="stylesheet" href="css/styles.css" type="text/css" />
</head>


<body>
    <h1> Pixabay Image Search </h1>
        <form>
        <input type="text" id="keyword" name="keyword" placeholder="Search"/> 
        <div class="after"></div><br><br><br><br>
        
        <a class="btn-liquid">
        		<span  onclick="searchImage()" type="submit" name="submitBtn" class="inner">Search</span>
        </a>
        </form>
                   
        <br /><br /><br><br><br><br><br><br><br><br>
        
        <div id="images"></div>
        
        <form action="viewFavorites.php">
            <button href="viewFavorites.php"> View Favorites </button>
        </form>
    
    
    <script src="functions.js"></script>
</body>
</html>