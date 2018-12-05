<?php
    include 'inc/header.php';
    
    function getPetList(){
        include 'dbConnection.php';
        $conn = getDatabaseConnection("pets");
        $sql = "SELECT * FROM pets";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $record;
    }
?>
	<!--Add main menu here -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <a class="navbar-brand" href="https://csumb.edu">CSUMB</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="index.php">Home</a>
                <a class="nav-item nav-link active" href="#">Adoptions</a><span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="about.php">About Us</a>
            </div>
        </div>
    </nav>
    
    <div class="jumbotron">
      <h1> CSUMB Animal Shelter</h1>
      <h2> The "official" animal adoption website of CSUMB </h2>
    </div>

<?php
    
    $pets =getPetList();
    
    foreach($pets as $pet){
        echo "Name: ";
        echo "<a href='#' class='petLink' id='".$pet['id']."' >". $pet['name'] . "</a><br>";
        echo "Type: " . $pet['type'] . "<br>";
        echo "<button id='" . $pet['id']."' type='button' class='btn btn-primary petLink'>Adopt Me!</button>";
        echo "<hr><br>";
    }
?>





    <script>
        $(document).ready(function(){
            $(".petLink").click(function(){
                
                $('#petInfoModal').modal("show");
                $("petInfo").html("<img src='img/loading.gif'>");
                
                $.ajax({
                    
                    type: "GET",
                    url: "api/getPetInfo.php",
                    dataType: "json",
                    data: {"id": $(this).attr('id')},
                    success: function(data,status){
    
                        console.log(data);
                        $("#petInfo").html(" <img src='img/" + data.pictureURL + "'><br>" +
                                           " Age: " + data.age + "<br>" + 
                                           " Breed: " + data.breeed + "<br>" + 
                                           data.description);
                                           
                        $("#petNameModalLabel").html(data.name);
                    },
                    complete: function(data,status){
                        
                    }
                });//ajax
            });//.petLink click
        });//document.ready
    </script>

    <!--Modal-->
    <div class="modal fade" id="petInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="petNameModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="petInfo"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class-"btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<?php
    include 'inc/footer.php';
?>