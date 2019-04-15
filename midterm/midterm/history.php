<!DOCTYPE html>
<html>
<head>
    <title> Match @ Cinder </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
      ul, h1 {
          list-style-type: none;
          margin: 0;
          padding: 0;
          text-align:center;
        }
        
        td {
            padding: 10px;
            text-align: left;
        }
        
        table {
            width: 30%;
            border-spacing: 0;
            margin: 0 auto;
        }
    </style>
</head>

<body>
        <script>
        /*global $*/
        $(document).ready(function() {
            
                    
                       
            $.ajax({
                type: "GET",
                url: "api/getRandomBio.php",
                dataType: "json",
                success: function(data, status) {
                    if (data.length != 0) {
                        $("#matchImage").append("<img src='" + data.picture_url + "'  />");
                        $("#matchUsername").html("About @" + data.username);
                        $("#matchBio").html(data.about_me);
                        $("#matchDetails").append("<a href='#' class='detailLink'>Details</a> ");
        
                    }
                }
            });
            
             $(document).on('click', '.detailLink', function(){
                $('#detailModal').modal("show");
                $.ajax({
                    type: "GET",
                    url: "api/getRandomBio.php",
                    dataType: "json",
                    data: {"id" : $(this).attr("id")},
                    success: function(data, status) {
                        data.forEach(function(key){
                            // $("#userDetails").html("");
                            $("#userDetails").html("About @" + data.username);
                            $("#userDetails").html(data.about_me);
                            // data.forEach(function(key){
                            //     $("#history").append("Purchase Date: " + key['purchaseDate'] + "<br>");
                            //     $("#history").append("Unit Price: " + key['unitPrice'] + "<br>");
                            //     $("#history").append("Quantity " + key['quantity'] + "<br>");
                            // });
                        });
                    }
                });
            });
            

        });
    </script>
<ul>
  <li><a href="index.php">Match</a></li>
  <li><a href="history.php">History</a></li>
</ul>
    <h1> History  </h1><br>

       <table>
        <tr>
            <th>Photo</th>
            <th>Username</th>
            <th>Details</th>
        </tr>
        <tr>
            <td><span id="matchImage"></span></td>
            <td><span id="matchUsername"></span></td>
            <td><span id="matchDetails"></td>
      
        </tr>

    </table>
    
    <div id="users"></div>

                
                <!--modal-->
                <div class="modal" id="detailModal" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div id="userDetails"></div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>



</body>

</html>