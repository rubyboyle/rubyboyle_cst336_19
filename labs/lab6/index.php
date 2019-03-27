<!DOCTYPE html>
<html>
    <head>
        <title> Lab 6: Ottermart Product Search</title>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script>
            /*global $*/
            $(document).ready(function(){
                
                $("#searchForm").on("click", function(){
                   $.ajax({ 
                        type: "GET",
                        url: "API/getSearchResults.php",
                        dataType: "json",
                        data: {
                            "product": $("[name=product]").val(),
                            "category": $("[name=category]").val(),
                            "priceFrom": $("[name=priceFrom]").val(),
                            "priceTo": $("[name=priceTo]").val(),
                            "orderBy": $("[name=orderBy]:checked").val(),
                        },
                        success: function(data, status) {
                            $("#results").html("<h3> Products Found: </h3>");
                            data.forEach(function(key) {
                                $("#results").append("<a href='#' class='historyLink' id='" + key['productId'] +"'>History</a> ");
                                $("#results").append(key['productName'] + " " + key['productDescription'] + " $" + key['price'] + "<br>");
                            });
                            
                        }
                   });
                });
                
                //Gets first 10 products from the database and displays them
                $.ajax({
                    type: "GET",
                    url: "API/getProducts.php",
                    dataType: "json",
                    success: function(data,status) {
                      //alert(data[0].productName);
                      data.forEach(function(product){
                          $("#products").append("<div class='row'>" + 
                                                "<div class='col1'>" + product.productName + "</div>"+
                                                "<div class='col2'>"+"$" + product.productPrice + "</div>"+
                                                "</div>");
                      });
                    },
                    complete: function(data,status) { //optional, used for debugging purposes
                    alert(status);
                    }
                    
                });//ajax
                
                
                //Gets Category list from database and displays them in the dropdown menu
                $.ajax({
                    type: "GET",
                    url: "API/getCategories.php",
                    dataType: "json",
                    success: function(data, status) {
                        data.forEach(function(key) {
                            $("#categories").append("<option value=" + key["catId"] + ">" + key["catName"] + "</option>");
                        });
                    }
                });                
                
            });//documentReady
            
            $(document).on('click', '.historyLink', function(){
                $('#purchaseHistoryModal').modal("show");
                $.ajax({
                    type: "GET",
                    url: "API/getPurchaseHistory.php",
                    dataType: "json",
                    data: {"productId" : $(this).attr("id")},
                    success: function(data, status) {
                        if(data.length != 0) {
                            $("#history").html("");
                            $("#history").append(data[0]['productName'] + "<br/>");
                            $("#history").append("<img src='" + data[0]['productImage'] +"' width='200' /> <br/>");
                            data.forEach(function(key){
                                $("#history").append("Purchase Date: " + key['purchaseDate'] + "<br>");
                                $("#history").append("Unit Price: " + key['unitPrice'] + "<br>");
                                $("#history").append("Quantity " + key['quantity'] + "<br>");
                            });
                        } else {
                            $("#history").html("No purchase history for this item.");
                        }
                    }
                });
            });
            
        </script>

        <style>
        
            .row  { display:flex; }
        
            .col1 { width:250px; }

        </style>           
        
    </head>
    <body>

        <h1> Product Search </h1>
        

               Product: <input type="text" name="product" id="product" /><br>
                
               Category:
                    <select name="category" id="categories">
                        <option value=""> Select One </option>
                    </select>
                <br>
                Price:  From <input type="text" name="priceFrom" size="7"/>
                        To   <input type="text" name="priceTo" size="7"/>
                <br>
                Order result by:
                <br>
                <input type="radio" name="orderBy" value="price"/> Price <br>
                <input type="radio" name="orderBy" value="name"/> Name
                <br><br>
          
                <button id="searchForm">Search</button>        
                
                <br><hr><br>
                
                <div id="results"></div>
                
                <!--modal-->
                <div class="modal" id="purchaseHistoryModal" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Purchase History</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div id="history"></div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
    </body>
</html>