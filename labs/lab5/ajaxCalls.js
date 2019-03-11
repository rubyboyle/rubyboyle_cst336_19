     /*global $*/
     $(document).ready(function() {
         $("#username").change(function() {
                    $.ajax({
                        type: "GET",
                        url: "api/usernameChecker.php",
                        dataType: "json",
                        data: { "username":$("#username").val() },
                        success: function(data,status) {
                            if(data.available){
                                $("#usernameError").html("Username is available!");
                                $("#usernameError").css("color", "green");
                            } else {
                                $("#usernameError").html("Username is not available!");
                                $("#usernameError").css("color", "red");
                            }
                        },
                    });//ajax  
                });
                
                 $("#password").on("click", function(){
                    $.ajax({
                        type: "GET",
                        url: "api/strongPwdAPI.php",
                        dataType: "json",
                        data: {"length" : "10" },
                        success: function(data,status) {
                          alert(data.suggestedPwd);
                        },
                    });//ajax
                }); //passwordClick 
                
                
             $("#password").on("change", function(){
                    $.ajax({
                        type: "GET",
                        url: "api/validatePwd.php",
                        dataType: "json",
                        data: {"username" : $("#username").val(),
                               "pwd" : $("#password").val()
                        },
                        success: function(data,status) {
                          
                        //   alert(data);
                         if(data.validPwd){
                            $("#passwordError").html("Password is valid!");
                            $("#passwordError").css("color", "green");
                            } else {
                            $("#passwordError").html("Username is invalid, contains username!");
                            $("#passwordError").css("color", "red");
                            }
                        },
                    });//ajax
                }); //passwordClick   
     }); //document.ready
     