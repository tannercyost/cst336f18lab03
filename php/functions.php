<?php
    // $player1 = array();
    // $player2 = array();
    // $player3 = array();
    // $player4 = array();
    $shuffledCards = array();
    $playerScores = array();
    $numPlayers = 4;
    
    // setup();

    function setup()
    {
        // global $player1;
        // global $player2;
        // global $player3;
        // global $player4;
        
        global $shuffledCards, $numPlayers;
        
        $cards = array();
        for ($i = 0; $i < 13; $i++)
        {
            $cards[$i] = array("suit" => "clubs", "image" => "./cards/clubs/", "value" => $i+1);
        }
        
        for ($i = 0; $i < 13; $i++)
        {
            $cards[$i+13] = array("suit" => "spades", "image" => "./cards/spades/", "value" => $i+1);
        }
        
        for ($i = 0; $i < 13; $i++)
        {
            $cards[$i+26] = array("suit" => "hearts", "image" => "./cards/hearts/", "value" => $i+1);
        }
        
        for ($i = 0; $i < 13; $i++)
        {
            $cards[$i+39] = array("suit" => "diamonds", "image" => "./cards/diamonds/", "value" => $i+1);
        }
        
        for ($i = 51; $i>=0; $i=$i-1)
        {
            $index = rand(0,$i);
            $shuffledCards[$i] = $cards[$index];
            array_splice($cards, $index, 1);
        }
    }
    
    
    
    function play()
    {
        global $shuffledCards, $playerScores, $numPlayers;
        
        $player1 = array();
        $player2 = array();
        $player3 = array();
        $player4 = array();
        
        
        for ($i = 1; $i<=$numPlayers; $i++)
        {
            ${'player'.$i.'total'} = 0;
            while (${'player'.$i.'total'} < 42)
            {
                $tempCard =  array_pop($shuffledCards);
                array_push(${'player'.$i}, $tempCard);
                ${'player'.$i.'total'} += $tempCard["value"];
            }
            print(${'player'.$i.'total'});
            
            for ($card = 0; $card < count(${'player'.$i}); $card++)
            {
                $image = ${'player'.$i}[$card]['image'];
                $value = ${'player'.$i}[$card]["value"];
                $path = $image.$value.".png";
                echo "<img src=$path />";
            }
            print("<br/>");
            $playerScore["player".$i] = ${'player'.$i.'total'};
        }
    }
?>