<?php
$string = $argv[1];
preg_match_all('/\d+|\w/', $string, $matches);
$x = 0;
$y = 0;
$direction = 'North';

foreach ($matches as $match) {
    foreach ($match as $value) {
        if(is_numeric($value) && $value > 0){
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
                if($x < 0){
                    $x = -$x;
                }
            }
        }
        else
        {
            $value = strtoupper($value);
            if($value == 'R'){
                if($direction == 'North'){
                    $direction = 'East';
                }
                elseif ($direction == 'East'){
                    $direction = 'South';
                }
                elseif ($direction == 'South'){
                    $direction == 'West';
                }
                else{
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
                    $direction == 'East';
                }
                else{
                    $direction = 'South';
                }
            }
            else if($value == 'West'){
                continue;
            }
        }
    }
}
echo 'X: ', $x.' Y: ',$y. ' Direction: ', $direction
?>
