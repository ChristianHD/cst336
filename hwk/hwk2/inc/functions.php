<?php

    function play(){
        $randomValue = rand(2,14);
        $randonSuit = rand(0,3);
        displayCard($randomValue, $randonSuit);
    }


    function getRandomValue(){
        return $randomValue = rand(2,14);
    }

    function getCardSuit(){
        $randomValue2 = rand(0,3);
        if($randomValue2 == 0){
            $cardSuit = "clubs";
        } elseif ($randomValue2==1) {
            $cardSuit = "spades";
        } elseif ($randomValue2==2) {
            $cardSuit = "diamonds";
        } elseif ($randomValue2==3) {
            $cardSuit = "hearts";
        }
    }

    function displayCard($randomValue, $randonSuit){
        switch($randonSuit){
            case 0: $cardSuit = "clubs";
                break;
            case 1: $cardSuit = "spades";
                break;
            case 2: $cardSuit = "diamonds";
                break;
            case 3: $cardSuit = "hearts";
                break;                
        }
        
        $cardName = $randomValue . '_of_' . $cardSuit . '.png';
        echo "<div id='cards'>";
        echo "<img id='leftCard' src='img/$cardName' alt='test' title='test' >";
        echo "<img id='rightCard' src='img/back_of_card.png' alt='test' title='test' >";
        echo "</div>";
    }
?>