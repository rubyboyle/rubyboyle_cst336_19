<!DOCTYPE html>
<html>

<head>
  <title> Sign Up Page </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <script src="ajaxCalls.js"></script>

</head>

<body>

  <!--<h1> Sign Up Form </h1>-->

  <img src="images/logo_gxrl.png" style="height:100px;" id="logo">
  <img src="images/backtoschool.JPG" style="height:520px;" id="pic">
  <form id="container">
    <!--<fieldset>-->
    <legend>Sign Up: Back to School Deals</legend><br>
    <!--First Name: -->
    <input type="text" placeholder="first name">
    <!--Last Name: -->
    <input type="text" placeholder="last name"><br><br>
    <!--Email: -->
    <input type="text" placeholder="email">
    <!--Phone Number:-->
    <input type="text" placeholder="phone number">
    <!--username-->
    <input type="text" placeholder="username" id="username"><br>
    <span id="usernameError" class="error"></span> <br />
    <!--Password: -->
    <input type="text" placeholder="Password" name="password" id="password"><br>
    <span id="passwordError" class="error"></span> <br />
    <input type="submit" value="Sign up!" class="submitButton">
  </form>

</body>
</html>
