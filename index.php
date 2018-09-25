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
        <?php 
            setup();
            play();
            $time_end = microtime(true);
            $totalTime = round(($time_end-$time_start)*1000, 3);
            $_SESSION['sumTime'] += $totalTime;
            echo "Execution Time: $totalTime milliseconds<br />";
            $avgTime = round($_SESSION['sumTime'] / $_SESSION['executions'], 3);
            echo "Average Time: $avgTime milliseconds";
            echo "<form id form>
                      <input type='submit' value = 'Play Again'/>
                  </form>";
        ?>
        
        
        
    </body>
</html>