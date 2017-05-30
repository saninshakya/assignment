<?php
// get the string passed from the cmd
// $string = $argv[1];
$string = 'RRW11RLLW19RRW12LW1';
/*
* convert the string into array.
* @$x, $y are set the default co-ordinates of Bot
* @$direction Bot is facing towards default 'North'
* @$walk is set false at beginning and is set true when 'W' key is found.
*/
preg_match_all('/\d+|\w/', $string, $matches);
$x = 0;
$y = 0;
$direction = 'North';
$walk = false;
foreach ($matches as $match) {
    foreach ($match as $value) {
        /*
        * check if the value is number or alphabet
        * check if the previous alphabet was 'W'
        * walk the number of steps along the given direction.
        */
        if(is_numeric($value) && $value > 0){
            if($walk == true)
            {
                if($direction == 'East'){
                    $x = $x + $value;
                }
                if($direction == 'North'){
                    $y = $y + $value;
                }
                if($direction == 'South'){
                    $y = $y - $value;
                }
                if($direction == 'West'){
                    $x = $x - $value;
                }
            }
            $walk = false;
        }
        else
        {
            // convert the alphabet to uppercase
            $value = strtoupper($value);
            //check if the alphabet is 'R' or 'L' and rotate the Bot
            if($value == 'R'){
                if($direction == 'North'){
                    $direction = 'East';
                }
                elseif ($direction == 'East'){
                    $direction = 'South';
                }
                elseif ($direction == 'South'){
                    $direction = 'West';
                }
                elseif ($direction == 'West'){
                    $direction = 'North';
                }
            }
            else if($value == 'L'){
                if($direction == 'North'){
                    $direction = 'West';
                }
                elseif ($direction == 'East'){
                    $direction = 'North';
                }
                elseif ($direction == 'South'){
                    $direction = 'East';
                }
                elseif ($direction == 'West'){
                    $direction = 'South';
                }
            }
            //if W is found continue the loop and set the $walk as true
            else if($value == 'W'){
                $walk = true;
                continue;
            }
        }
    }
}
echo 'X: ', $x.' Y: ',$y. ' Direction: ', $direction
?>
