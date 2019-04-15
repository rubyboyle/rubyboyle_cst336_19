<?php
session_start();

if (!isset($_SESSION['username'])){
  header("Location: login.php");
}
?>

<body>
  <div>
      <form action="logoff.php">
           <input type="submit" value="Sign out" />
      </form>  
      <h1>Welcome Administrator   
        <i>$_SESSION['adminName']
      </h1>
 </div>
</body>
</html>