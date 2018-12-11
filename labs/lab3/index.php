<?php

    $backgroundImage = "img/sea.jpg";
    
    // API call goes here
    if(isset($_GET['keyboard'])){
        echo "You searched for: " . $_GET['keyboard'];    
        $imageURLs = getImageURLs($keyboard);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
        
        
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
        <style>
            @import url("css/styles.css");
            body {
                background-image: url('<?=$backgroundImage ?>');
            }
        </style>
    </head>
    
    <body>
        <?php
            if(!isset($imageURLs)){
                echo "<h2> Type a keyboard to display a slideshow <br> with random images from Pixabay.com</h2>";
            } else {
                // Display Carousel Here
        ?>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators Here -->
            <ol class="carousel-indicators">
                <?php
                for ($i = 0; $i < 5; $i++){
                    echo "<li data-targe='#carousel-example-generic' data-slide-to='$i'";
                    echo ($i == 0)?" class='active'": "";
                    echo "><li>";
                }
                ?>
            </ol>
            <!-- Wrapper for Images -->
            <div class="carouse-inner" role="listbox">
                <?php
                    for ($i = 0; $i < 5; $i++){
                        do {
                            $randomIndex = rand(0,count($imageURLs));
                        }
                        while(!isset($imageURLs[$randomIndex]));
                    
                        echo 'div class="carousel-item ';
                        echo ($i == 0 )?"active": "";
                        echo '">';
                        echo "<img scr='" . $imageURLs[$randomIndex] . '">';
                        echo '</div>';
                        unset($imageURLs[$randomIndex]);
                    }
                ?>   
            </div>
            <!-- Controls Here-->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

                
        ?>
        
        <h1>Hello</h1>
        
        <?php
            }
        ?>
        <br/><br />
        <!-- HTML form goes here! -->
        <form>
            <input type="text" name="keyboard" placeholder="Keyboard">
            <input type="submit" value="Submit"/>
        </form>
        <br/><br />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"</script
    </body>
</html>