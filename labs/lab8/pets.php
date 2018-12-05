<?php

    function getPetList(){
        include 'dbConnection.php';
        $conn = getDatabaseConnection("pets");
        
        $sql = "SELECT * FROM pets";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO:: FETCH_ASSOC);
        
        return $record;
    }
    
    $pets =getPetList();
    
    foreach($pets as $pet){
        echo "Name: ";
        echo "<a href='#' class='petLink' id='".$pet['id']."' >". $pet['name'] . "</a><br>";
        echo "Type: " . $pet['type'] . "<br>";
        echo "<button id='" . $pet['id']."' type='button' class='btn btn-primary petLink'>Adopt Me!</button>";
        echo "<hr><br>";
    }
?>