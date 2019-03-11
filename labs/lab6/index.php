<!DOCTYPE html>
<html>
    <head>
        <title> Lab 6: Ottermart Product Search</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        
        <script>
            
            $(document).ready(function(){
                
                $.ajax({

                    type: "GET",
                    url: "api/getProducts.php",
                    dataType: "json",
                    success: function(data,status) {
                      //alert(data[0].productName);
                      for (i = 0; i < data.length; i++) {
                          $("#products").append(data[i].productName + "<br>");
                          
                      }
                    //   forEach(function(product){
                          
                    //       $("#products").append(product.productName + "<br>");
                          
                    //   })
                    },
                    complete: function(data,status) { //optional, used for debugging purposes
                    //alert(status);
                    }
                    
                });//ajax
                
                
                
                
            });//documentReady
            
        </script>
        
    </head>
    <body>

        <h1> Product Search </h1>
        
        <div id="products">
            
            
        </div>

    </body>
</html>