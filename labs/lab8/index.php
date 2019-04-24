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
                    type: "GET",
                    url: "api/favs.php",
                    dataType: "json",
                    data: {
                      "action": action,
                      "favorite": favorite,
                    //   "keyword": $("#keyword").val()
                    },
                    success: function(data, status) {
                        alert("Yes");
                    },
                  });//ajax
            }
    });//documentReady
    

</script>
<link rel="stylesheet" href="css/styles.css" type="text/css" />
</head>


<body>
    <h1> Pixabay Image Search </h1>
        <form>
        <input type="text" id="keyword" name="keyword" placeholder="Search"/> 
        <div class="after"></div><br><br><br><br>
        
        <a class="cta" onclick="searchImage()" type="submit" name="submitBtn">
        		<span>Search</span>
        		  <svg width="13px" height="10px" viewBox="0 0 13 10">
                    <path d="M1,5 L11,5"></path>
                    <polyline points="8 1 12 5 8 9"></polyline>
                  </svg>
        </a>
        </form>
                   
        <br /><br /><br><br><br><br><br><br><br><br>
        
        <div id="images"></div>
        
        
        <a href="viewFavorites.php" class="cta">
        	<span>View Favorites</span>
        	<svg width="13px" height="10px" viewBox="0 0 13 10">
                <path d="M1,5 L11,5"></path>
                <polyline points="8 1 12 5 8 9"></polyline>
            </svg>
        </a>

    
    
    <script src="functions.js"></script>
</body>
</html>