<?php

    setup();
    
    function setup()
    {
        $numPlayers = 4;
        
        $cards = array();
        for ($i = 0; $i < 13; $i++)
        {
            $cards[$i] = array("suit" => "clubs", "image" => "./img/clubs.png", "value" => $i+1);
        }
        
        for ($i = 0; $i < 13; $i++)
        {
            $cards[$i+13] = array("suit" => "spades", "image" => "./img/spades.png", "value" => $i+1);
        }
        
        for ($i = 0; $i < 13; $i++)
        {
            $cards[$i+26] = array("suit" => "hearts", "image" => "./img/hearts.png", "value" => $i+1);
        }
        
        for ($i = 0; $i < 13; $i++)
        {
            $cards[$i+39] = array("suit" => "diamonds", "image" => "./img/diamonds.png", "value" => $i+1);
        }
        
        $shuffledCards = array();
        for ($i = 51; $i>=0; $i=$i-1)
        {
            $index = rand(0,$i);
            $shuffledCards[$i] = $cards[$index];
            array_splice($cards, $index, 1);
        }
        
        for ($i = 0; $i<$numPlayers; $i++)
        {
            ${'player'.$i+1} = array();
        }
    }
?>