<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
    </head>
    <body>
        
        <?php
        
        for($i=1; $i<4; $i++){
            ${"randomValue" . $i } = rand(0,2);
            displaySymbol(${"randomValue" . $i} );
        }     
        
        function displaySymbol($randomValue){
            /*
            if ($randomValue == 0) {
                echo '<img src="img/seven.png" alt="seven" title="Seven" width="70" />';
            } else if ($randomValue == 1) {
                echo '<img src="img/cherry.png" alt="cherry" title="Cherry" width="70" />';
            } else {
                echo '<img src="img/lemon.png" alt="lemon" title="Lemon" width="70" />';
            }
        }
        */
        
            switch ($randomValue) {
                case 0: $symbol = "seven";
                    break;
                case 1: $symbol = "cherry";
                    break;
                case 2: $symbol = "lemon";
                    break;
            }
            
            echo "<img src='img/$symbol.png' alt='$symbol' title='". ucfirst($symbol). "' width='70' />";
        }
        
        function displayPoints($randomValue1, $randomValue2, $randomValue3) {
            echo "<div id='output'>";
            if($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3) {
                switch ($randomValue1)
            }
            
        }
        
        ?>
 
    </body>
</html>