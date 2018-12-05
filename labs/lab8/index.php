<?php
    include 'inc/header.php';
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
                <a class="nav-item nav-link active" href="#">Home<span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="pets.php">Adoptions</a>
                <a class="nav-item nav-link" href="about.php">About Us</a>
            </div>
        </div>
    </nav>
            
    <div class="jumbotron">
      <h1> CSUMB Animal Shelter</h1>
      <h2> The "official" animal adoption website of CSUMB </h2>
    </div>
    <!-- add Carousel component -->
    <br><br>
    <a class="btn btn-outline-primary" href="pets.php" role="button">Adopt Now!</a>
        
    <br><br>
    <hr>
    
<?php
    include 'inc/footer.php';
?>