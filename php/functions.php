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
        
        
        $player1 = array();
        $player2 = array();
        $player3 = array();
        $player4 = array();
        
        for ($i = 1; $i<=$numPlayers; $i++)
        {
            ${'player'.$i.'total'} = 0;
            while ('player'.$i.'total' < 42)
            {
                $tempCard =  array_pop($shuffledCards);
                array_push(${'player'.$i}, $tempCard);
                ${'player'.$i.'total'} += $tempCard["value"];
            }
            print(${'player'.$i.'total'});
            var_dump(${'player'.$i});
        }
    }
?>