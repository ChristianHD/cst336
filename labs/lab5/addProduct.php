<style type="text/css">
    .container-fluid{
        width: 600px;
        border: 1px gray solid;
        border-radius: 10px;
        margin-top: 10px;
    }
</style>
<?php
    include 'dbConnection.php';
    $conn = getDatabaseConnection();
    
    function getCategories(){
        global $conn;
        
        $sql = "SELECT catId, catName FROM om_category ORDER BY catName";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($records as $record) {
            echo "<option value='".$record["catId"]."'>".$record['catName']. "</option>";
        }
    }
    
    if(isset($_GET['submitProduct'])){
        $productName = $_GET['productName'];
        $productDescription = $_GET['description'];
        $productPrice = $_GET['price'];
        $productCat = $_GET['catId'];
        $productImage = $_GET['productImage'];
        
        $sql = "INSERT om_product
                (productName, productDescription, productImage, price, catId)
                VALUES (:productName, :productDescription, :productImage, :price, :catId)";
        
        $np = array();
        $np[':productName'] = $productName;
        $np[':productDescription'] = $productDescription;
        $np[':price'] = $productPrice;
        $np['catId'] = $productCat;
        $np['productImage'] = $productImage;
        $stmt = $conn -> prepare($sql);
        $stmt ->execute($np);
        
        echo "<p>Product successfully added to database<p>";
    
    }
    

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin | Add Product </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="container-fluid">
        <div class="page-header">
        <h1>Admin | Add Product</h1>
        </div>
        <form>
            <strong>Product Name</strong><input type="text" class="form-control" name="productName"/><br>
            <strong>Description</strong><textarea type="textarea" name="description" class="form-control" cols=50 rows=4></textarea><br>
            <strong>Price</strong><input type="text" class="form-control" name="price"/><br>
            <strong>Category</strong><select name="catId" class="form-control">
                <option value="">Select One</option>
                <?php getCategories();?>
            </select><br>
            <strong>Set Image Url</strong><input type="text" name="productImage" class="form-control"><br>
            <input type="submit" name="submitProduct" class='btn btn-primary' value="Add Product">
        </form>
    </div>
    </body>
</html>