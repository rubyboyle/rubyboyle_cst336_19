<?php
session_start();

//checks whether user has logged in
if (!isset($_SESSION['adminName'])) {
    
    header('location: index.php'); //sends users to login screen if they haven't logged in
    
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title> Ottermart - Admin Section </title>
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="styles.css">
        
        <style>
            /*.row  { */
            /*    display:flex; */
                
            /*}*/
        
            /*.col1 { width:250px; }*/
        </style>                
    </head>
    <body>
         <div class="limiter">
			<div class="container-login100">
				<div class="wrap-login300">
			
					 <h1> Ottermart - Administrator </h1><br><br>
                        
                            <form action="logout.php" class="admin100-form-btn">
                                <button>Logout</button>
                            </form><br><br>
                            
                              <form action="addProduct.php" class="admin100-form-btn">
                                <button>Add New Product</button>
                            </form>
                        <?php
                        
                            include 'api/inc/dbConnection.php';
                            $conn = getDatabaseConnection("ottermart");
                            $sql = "SELECT * FROM om_product ORDER BY productName";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records
                        
                            foreach ($records as $record) {
                                echo "<a href='updateProduct.php' class='admin100-form-btn'>Update</a>";
                                echo "<a href='deleteProduct.php' class='admin100-form-btn'>Delete</a>";
                                echo $record['productName'] . "  " . $record[price]   . "<br>";
                            }
                        
                        ?>
	
			
				</div>
			</div>
		</div>
    </body>
</html>

