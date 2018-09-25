<?php
    // $player1 = array();
    // $player2 = array();
    // $player3 = array();
    // $player4 = array();
    $shuffledCards = array();
    $playerScores = array();
    $numPlayers = 4;
    $players = array("Who", "What", "I Don't Know", "Why");
    
    // setup();

    function setup()
    {
        
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
        global $shuffledCards, $playerScores, $numPlayers, $players;
        
        $player1 = array();
        $player2 = array();
        $player3 = array();
        $player4 = array();
        
        
        shuffle($players);
        
        for ($i = 1; $i<=$numPlayers; $i++)
        {
            echo '<div class="player">';
            
            // Deal cards until player's hand is greater than or equal to 42
            ${'player'.$i.'total'} = 0;
            while (${'player'.$i.'total'} < 42)
            {
                $tempCard =  array_pop($shuffledCards);
                array_push(${'player'.$i}, $tempCard);
                ${'player'.$i.'total'} += $tempCard["value"];
            }
            
            
            // Display name and picture
            $imgPath = "./img/".$players[$i-1].".jpg";
            echo "<div class='name'>".$players[$i-1]."</div>";
            echo "<span class='picture'><img src='$imgPath' class='avatar' /></span>";
            
            
            // Display cards
            echo "<span class='cards'>";
            for ($card = 0; $card < count(${'player'.$i}); $card++)
            {
                $image = ${'player'.$i}[$card]['image'];
                $value = ${'player'.$i}[$card]["value"];
                $path = $image.$value.".png";
                echo "<img src=$path />";
            }
            echo "</span>";
            
            
            // Display score
            echo "<span class='score'>";
            echo ${'player'.$i.'total'};
            $playerScore["player".$i] = ${'player'.$i.'total'};
            echo "</span>";
            echo "</div>";
            
            // Line thing
            echo "<hr />";
        }
        
        
        // Calculate winners
        $winners = array();
        $exactWinner = false;
        $minDistance = 42;
        foreach ($playerScores as $name => $score)
        {
            if ($score == 42)
            {
                $exactWinner = true;
                $winners[$name] = $score;
            }
        }
        
        if (!$exactWinner)
        {
            foreach ($playerScores as $name => $score)
            {
                if (42-$score < $minDistance && $score > 0)
                {
                    $winners[$name] = $score;
                }
            }
        }
        
        foreach ($winners as $name => $score)
        {
            echo "$name ";
        }
        echo "wins!";
        
        // fuck you PHP, I've reached a dissasociative state with associative arrays
    }
?>