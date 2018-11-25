<?php

    include 'dbConnection.php';
    $conn = getDatabaseConnection();
    
    function getCategories($catId){
        global $conn;
        $sql = "SELECT catId, catName FROM om_category ORDER BY catName";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record){
            echo "<option ";
            echo ($record["catId"] == $catId)? "selected" : "";
            echo " value='".$record["catId"]."'>".$record['catName']." </option>";
        }
    }
    
    function getProductInfo(){
        global $conn;
        
        $sql = "SELECT * FROM om_product WHERE productId = " . $_GET['productId'];
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $record;
    }
    
    if(isset($_GET['productId'])){
        $product = getProductInfo();
    }
    
    if(isset($_GET['updateProduct'])){
        
        $sql = "UPDATE om_product
                SET productName = :productName,
                    productDescription = :productDescription,
                    productImage = :productImage,
                    price = :price,
                    catId = :catId
                WHERE productId = :productId";
                
        $np = array();
        $np[":productName"] = $_GET['productName'];
        $np[":productDescription"] = $_GET['description'];
        $np[":productImage"] = $_GET['productImage'];
        $np[":price"] = $_GET['price'];
        $np[":catId"] = $_GET['catId'];
        $np[":productId"] = $_GET['productId'];

        $stmt = $conn->prepare($sql);
        $stmt ->execute($np);
        echo "Product has been updated";
    }
    

?>

<style type="text/css">
    .container-fluid{
        width: 600px;
        border: 1px gray solid;
        border-radius: 4px;
        margin-top: 10px;
    }
    .btn-primary{
        width: 100%;
    }
</style>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin | Update Product </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="container-fluid">
        <div class="page-header">
        <h1>Admin | Update Product</h1>
        </div>
        <form>
            <input type="hidden" name="productId" value="<?=$product['productId']?>"/>
            <strong>Product Name</strong><input type="text" class="form-control" name="productName" value="<?=$product['productName']?>"><br>
            <strong>Description</strong><textarea type="textarea" name="description" class="form-control" cols=50 rows=4><?=$product['productDescription']?></textarea><br>
            <strong>Price</strong><input type="text" class="form-control" name="price" value="<?=$product['price']?>"/><br>
            
            <strong>Category</strong><select name="catId" class="form-control">
                <option>Select One</option>
                <?php getCategories($product['catId']);?>
            </select><br>
            
            <strong>Set Image Url</strong><input type="text" name="productImage" class="form-control" value="<?=$product['productImage']?>"><br>
            <input type="submit" class='btn btn-primary' name="updateProduct" value="Update Product">
        </form>
    </div>
    </body>
</html>

