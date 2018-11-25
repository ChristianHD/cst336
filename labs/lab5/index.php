<?php
    include 'dbConnection.php';
    $conn = getDatabaseConnection();
    
    function displayCategories(){
        global $conn;
        
        $sql = "SELECT catID, catName FROM om_category ORDER BY catName";
        
        $stmt = $conn->prepare($sql);
        $stmt ->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record){
            echo "<option value='".$record["catId"]."'>". $record["catName"]."</option>";
        }
    }
    
    function displaySearchResults(){
        global $conn;
        
        // Checks whether the user has submitted the form.
        if (isset($_GET['searchForm'])){
            
            echo "<h3>Products Found:</h3>";
        
            // Query below prevents SQL injections
            $namedParameters = array();
            
            $sql = "SELECT * FROM om_product WHERE 1";
            
            // Checks whether user has typed something in the "Product" text box
            if (!empty($_GET['product'])){
                $sql .= " AND productName LIKE :productName";
                $namedParameters[":productName"] = "%" . $_GET['product'] . "%";
                $sql .= " OR productDescription LIKE :productDescription";
                $namedParameters[":productDescription"] = "%" . $_GET['product'] . "%";
            }
            
            // Checks whether user has selected a cateogry
            if (!empty($_GET['category'])){
                $sql .= " AND catId = :categoryId";
                $namedParameters[":categoryId"] = $_GET['category'];
            }
            
            // Checks whether user has typed something in the "Product" text box
            if (!empty($_GET['priceFrom'])){
                $sql .= " AND price >= :priceFrom";
                $namedParameters[":priceFrom"] = "%" . $_GET['priceFrom'];
            }
            
            // Checks whether user has selected a cateogry
            if (!empty($_GET['priceTo'])){
                $sql .= " AND price <= :priceTo";
                $namedParameters[":priceTo"] = $_GET['priceTo'];
            }    
            
            if (!empty($_GET['orderBy'])){
                if($_GET['orderBy'] == "price"){
                    $sql .= " ORDER BY price";
                } else {
                    $sql .= " ORDER BY productName";
                }
            }
            
            $stmt = $conn->prepare($sql);
            $stmt->execute($namedParameters);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($records as $record){
                echo "<a href=\"purchaseHistory.php?productId=".$record["productId"]."\">History</a>";
                echo " " . $record["productName"] . " " . $record["productDescription"] ." $" . $record["price"] . "<br/><br/>";
            }
        }
    }
    
?>
<html>
    <head>
      <title>Ottermar | Product Search</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>        
      <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container-fluid">
            <h1>Ottermart Product Search </h1>
            <form style="width: 400px">
                Product: <input type="text" class="form-control" name="product"/>
                <br>
                Category:
                    <select name="category">
                        <option value="">Select One</option>
                        <?=displayCategories()?>
                    </select>
                <br>
                Price: From <input type="text" class="form-control" name="priceFrom" size="7"/>
                       To   <input type="text" class="form-control" name="priceTo" size="7"/>
                <br>
                Order result by:
                <br>
                <input type="radio" class="form-control" name="orderBy" value="price"/> Price <br>
                <input type="radio" class="form-control" name="orderBy" value="name"/> Name
                <br><br>
                <input type="submit" class='btn btn-primary' value="Search" name="searchForm" />
            </form>
            <br/>
        </div>
        <hr>
        <?= displaySearchResults() ?>
    </body>
</html>
