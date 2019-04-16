<!--<!DOCTYPE html>-->
<!--<html>-->
<!--    <head>-->
<!--        <title> Admin Login </title>-->
<!--    </head>-->
<!--    <body>-->

<!--        <h1 style="text-decoration: none;"> Ottermart</h1>-->
<!--        <h2 style="text-decoration: none;">Administrator Login</h2>-->
        
<!--        <form method="post" action="loginProcess.php" style="text-decoration: none;">-->
<!--          Username:  <input type="text" name="username" style="text-decoration: none;"/> <br><br>-->
<!--          Password:  <input type="password" name="password" style="text-decoration: none;"/> <br><br>-->
<!--          <input type="submit" value="Login" style="background-color: #4CAF50; /* Green */-->
<!--                                                    border: none;-->
<!--                                                    color: white;-->
<!--                                                    padding: 15px 32px;-->
<!--                                                    text-align: center;-->
<!--                                                    text-decoration: none;-->
<!--                                                    display: inline-block;-->
<!--                                                    font-size: 16px;">-->
<!--        </form>-->

<!--    </body>-->
    
<!--</html>-->

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login </title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<div class="login100-pic js-tilt" data-tilt>
						<img src="https://colorlib.com/etc/lf/Login_v1/images/img-01.png" alt="IMG">
					</div>
	
					<form method="POST" action="loginProcess.php" class="login100-form validate-form">
						<span class="login100-form-title">
							Administrator Login
						</span>
	
						<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
							<input class="input100" type="text" name="username" id="username" placeholder="Username">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
						</div>
	
						<div class="wrap-input100 validate-input" data-validate = "Password is required">
							<input class="input100" type="password" name="password" placeholder="Password">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>
	
						<div class="container-login100-form-btn">
							<input class="login100-form-btn" type="submit" value="Login"></input>
						</div>
					</form>
				</div>
			</div>
		</div>
    </body>
</html>

