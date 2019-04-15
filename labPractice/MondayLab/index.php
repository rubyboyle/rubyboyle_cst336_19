<!DOCTYPE html>

<html>
    <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <link rel="stylesheet" href="./CSS/styles.css" type="text/css" />
        
    </head>
    <body>
        <div class="jumbotron">
            <h1>Sign up for the Otter Newsletter</h1>
        </div>
        <div class = "main">
        <div class="panel panel-default">
            <div class="panel-heading"> Please enter your information</div>
            <div class="panel-body content" id ="form">
                
                <div id ="page0" class="allForm">
                    <form class= "form">
                    <input name="progress" type="hidden" value=1 />
                    Enter your name: <input type="text" name="name"/>
                    Enter your email: <input type="text" name="email"/>
                    <input class="button" type="submit" value="next" />
                    </form>
                </div>
                
                <div id="page1" class="allForm">
                    <form class = "form">
                    <input name="progress" type="hidden" value=2 />
                    Enter your major: <input type="text" name="major"/>
                    Enter your zip: <input type="text" name="zip"/>
                    <input class="button" type="submit" value="next" />
                  </form>
                </div>
                
                <div id="page2" class="allForm">
                    Submit this data?<br>
                    <button class="button" id="send">
                        Submit
                    </button>
                  </form>
                </div>
        </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"> Current data</div>
            <div class="panel-body content" id="current" >
                 <!-- Session data will go here -->
            </div>
            </div>
        </div>
        <button id="view"> View Data?</button>
        
    </body>
    
    <script type='text/javascript'>
    /*global $*/
    //Function to call API to save data into Session
    function displayNextForm(element){
        
        var array;
        if (element!=null){
            array= element.serialize();
        } else {
            array = {};
        }
        
         $.ajax({
            type: "post",
            url: "API/saveData.php",
            dataType: "json",
            data: array,
            success: function(data){
               
                var htmlString="";
                for (var key in data){
                    htmlString+= key+": "+ data[key]+"<br>";
                }
                $("#current").html(htmlString);
                
                $(".allForm").hide();
                $("#page"+data["progress"]).show();
            },
            
        });
        
    }
    
    $(document).ready(function(){
    //Call it as soon as page loads
    displayNextForm(null);
    
    
     $('.form').submit (function (event) {
         event.preventDefault();
         $.ajax({
             type: "post",
             url: "saveToSession.php",
             dataType: "json",
             data: $("#form").serialize(),
             success: function(data){
                 console.log(data);
             }
         });
        //  var element = $(this);
        // displayNextForm(element);
     }); 
    
   
});
    </script>
</html>