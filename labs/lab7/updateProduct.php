<?php
    session_start();
    
     include 'api/inc/dbConnection.php';
     $dbConn = startConnection("ottermart");
     include 'inc/functions.php';
    // validateSession();
    
    
    if (isset($_GET['updateProduct'])){  //user has submitted update form
        $productName = $_GET['productName'];
        $description = $_GET['description'];
        $price =  $_GET['price'];
        $catId =  $_GET['catId'];
        $image = $_GET['productImage'];
        
        $sql = "UPDATE om_product 
                SET productName= :productName,
                   productDescription = :productDescription,
                   price = :price,
                   catId = :catId,
                   productImage = :productImage
                WHERE productId = " . $_GET['productId'];
                
        $np = array();
        $np[":productName"] = $productName;
        $np[":productDescription"] = $description;
        $np[":productImage"] = $image;
        $np[":price"] = $price;
        $np[":catId"] = $catId;
        
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($np);
        echo "Product updated!";
             
        
    }
    if (isset($_GET['productId'])) {
    
      $productInfo = getProductInfo($_GET['productId']);    
      
     // print_r($productInfo);
        
        
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Products! </title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
    </head>
    <body>

        <div class='container'>
            <div class='text-left'>
                <a href="admin.php">Home</a>
                <h1> Updating a Product </h1>
                
                <br>
                
                <form>
                    <input type="hidden" name="productId" value="<?=$productInfo['productId']?>">
                   Product name: <br> <input type="text" name="productName" value="<?=$productInfo['productName']?>"><br>
                   Description: <br> <textarea name="description" cols="50" rows="4"> <?=$productInfo['productDescription']?> </textarea><br>
                   Price: <br> <input type="text" name="price" value="<?=$productInfo['price']?>"><br>
                   Category: <br>
                   <select name="catId">
                      <option value="">Select One</option>
                      <?php
                      
                      $categories = getCategories();
                      
                      foreach ($categories as $category) {
                          
                          echo "<option  "; 
                          echo  ($category['catId']==$productInfo['catId'])?"selected":"";
                          echo " value='".$category['catId']."'>" . $category['catName'] . "</option>";
                          
                      }
                      
                      ?>
                   </select> <br /> <br>
                   Set Image URL: <br> <input type="text" name="productImage" value="<?=$productInfo['productImage']?>"><br><br>
                   <input type="submit" name="updateProduct" value="Update Product">
                </form>
            </div>
        </div>
        
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>