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
