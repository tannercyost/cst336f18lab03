<?php
    include 'php/functions.php';
    $time_start = microtime(true);
    $sumTime = 0;
    session_start();
   
    if(isset($_SESSION['executions']))
    {
       $_SESSION['executions'] += 1;
    }
    else
    {
       $_SESSION['executions'] = 1;
    }
    
    if(!isset($_SESSION['sumTime']))
    {
       $_SESSION['sumTime'] = 0;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Yack Yack Silverjack</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    
    <body>
        <h1>Yack Yack Silverjack</h1>
        <h2>Could there be a worse name?</h2>
        <?php 
            setup();
            play();
            
            echo "<div id='buttonspace'><form id form>
                      <input type='submit' class='button' value = 'Play Again'/>
                  </form></div>";
            
            $time_end = microtime(true);
            $totalTime = round(($time_end-$time_start)*1000, 3);
            $_SESSION['sumTime'] += $totalTime;
            echo "<div id='stats'>";
            echo "Execution Time: $totalTime milliseconds<br />";
            $avgTime = round($_SESSION['sumTime'] / $_SESSION['executions'], 3);
            echo "Average Time: $avgTime milliseconds";
            echo "</div>";
        ?>
        
        
        
    </body>
</html>