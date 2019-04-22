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
                        
                      htmlString +=   "<img class='favorite' src='img/favorite.png' width='30'>";
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
                callFavoriteAPI("add",$(this).next().attr("src"));
            } else {
                
                $(this).attr("src","img/favorite.png");
                //remove image url from database
                callFavoriteAPI("delete",$(this).next().attr("src"));
                
            }
            
        });
    
        
        function callFavoriteAPI(action, url, keyword) {
            
            
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

<a class="btn-liquid">
		<span  onclick="searchImage()" type="submit" name="submitBtn" class="inner">Search</span>
</a>
<!--<button onclick="searchImage()" type="submit" name="submitBtn">Search  </button>-->
</form>
            <!--<h4>&nbsp;</h4>-->
            <!--<p>Click search, Enter to submit</p>-->
<br /><br /><br><br><br><br><br><br><br><br>

<div id="images"></div>
<script src="functions.js"></script>
</body>
</html>