<!DOCTYPE html>
<html>
    <head>
        <title> Sign Up - PHP Web API Version </title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        
        <script>
            /*global $*/
            
            $(document).ready(function() {
                // $("#username1").change(function() {
                //     $.ajax({
                //         type: "GET",
                //         url: "api/check_username_text_json.php",
                //         data: { "username":$("#username1").val() },
                //         success: function(data,status) {
                //             $("#username1Error").html(data);
                //         },
                //         complete: function(data,status) { //optional, used for debugging purposes
                //         //alert(status);
                //         }
                    
                //     });//ajax
                // });
                
                $("#username2").change(function() {
                    $.ajax({

                        type: "GET",
                        url: "api/check_Username_json.php",
                        dataType: "json",
                        data: { "username":$("#username2").val() },
                        success: function(data,status) {
                        //alert(data);
                            if(data.available){
                                $("#username2Error").html("Username is available!");
                                $("#username2Error").css("color", "green");
                            }
                            else {
                                $("#username2Error").html("Username is unavailable!");
                                $("#username2Error").css("color", "red");
                            }
                        },
                        complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
                        }
                    
                    });//ajax  
                });//username2 change
                
                
                 $("#password").on("click", function(){
                    
                    //alert("hi");
                    
                    $.ajax({

                        type: "GET",
                        url: "api/strongPwdAPI.php",
                        dataType: "json",
                        data: {"length" : "10" },
                        success: function(data,status) {
                          
                          alert(data.suggestedPwd);
                        
                        },
                        complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
                        }
                        
                    });//ajax
                    
                }); //passwordClick 
                
                
             $("#password").on("change", function(){
                    
                    //alert("hi");
                    
                    $.ajax({

                        type: "GET",
                        url: "api/validatePwd.php",
                        dataType: "json",
                        data: {"username" : $("#username1").val(),
                               "pwd" : $("#password").val()
                        },
                        success: function(data,status) {
                          
                          alert(data);
                        
                        },
                        complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
                        }
                        
                    });//ajax
                    
                }); //passwordClick                
                    
            });//documentReady

        </script>
    </head>
    
    <body>
        <fieldset>
            <legend>
                Sign Up
            </legend>
            
            First Name: <input type="text" id="firstName" name="firstName" /> <br />
            Last Name: <input type="text" id="lastName" name="lastName" /> <br />
            
            Username: <input type="text" id="username2" />
            <span id="username2Error" class="error"></span> <br />
            <br />
            
            Password: <input type="password" id="password"> <br />
            
            <button> Sign up!</button>
        </fieldset>
    </body>
</html>