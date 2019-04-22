<?php
/*global $*/
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

?>