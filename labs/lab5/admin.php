<?php
    session_start();
    include 'dbConnection.php';
    $conn = getDatabaseConnection();
    
    if(!isset($_SESSION['adminName'])) {
        header("Location:login.php");
    }
    
    function displayAllProducts() {
        global $conn;
        $sql = "SELECT * FROM om_product ORDER BY productId";
        $statement = $conn->prepare($sql);
        $statement ->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }
?>

<script>
    function confirmDelete(){
        return confirm("Are you sure you want to delete this product?");
    }
</script>

<!DOCTYPE html>
<html>
    <head>
      <title>Admin Page</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">
        <h1>Welcome to the Admin Page</h1>
        <form action="addProduct.php" style="float: left; margin-right: 10px">
            <input type="submit" class='btn btn-secondary' id="beginning" name="addproduct" value="Add Product"/>
        </form>
        <form action="logout.php" style="float: left">    
            <input type="submit" class='btn btn-secondary' id="beginning" value="Logout"/><br><br>
        </form>        
            <?php $records = displayAllProducts();
                echo "<table class = 'table table-hover'>";
                echo "<thread>
                        <tr>
                            <th scope='col'>ID</th>
                            <th scope='col'>Name</th>
                            <th scope='col'>Description</th>
                            <th scope='col'>Price</th>
                            <th scope='col'>Update</th>
                            <th scope='col'>Remove</th>
                        </tr>
                    </thread>";
                echo "<tbody>";
                foreach($records as $record){
                    echo "<tr>";
                    echo "<td>" . $record['productId']. "</td>";
                    echo "<td>" . $record['productName']. "</td>";
                    echo "<td>" . $record['productDescription']. "</td>";
                    echo "<td>$" . $record['price']. "</td>";
                    echo "<td><a class='btn btn-primary' href='updateProduct.php?productId=".$record['productId']."'>Update</a></td>";
                    
                    echo "<form action='deleteProduct.php' onsubmit='return confirmDelete()'>";
                    echo "<input type='hidden' name='productId' value=" . $record['productId'] ." />";
                    echo "<td><input type='submit' class='btn btn-danger' value='Remove'></td>";
                    echo "</form>";
                }
                echo "</tbody>";
                echo "</table>";
            ?>
        </div>
    </body> 
</html>
