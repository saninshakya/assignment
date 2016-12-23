<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<?php

function solution($xSize, $ySize, $matrix) {
    $m = 0;
    $n = 0;
    $xSize--;
    $ySize--;
    $sum = 0;

        for ($i = $n; $i <= $ySize; ++$i) {
            $sum = $sum + $matrix[$m][$i];
            print_r($matrix[$m][$i] . " ");
        }
        $m++;
        for ($i=$m; $i <= $xSize-1 ; $i++) { 
            $sum = $sum + $matrix[$i][$ySize];
            print_r($matrix[$i][$ySize] . " ");
        }
        $ySize--;
        for ($i=$ySize; $i > $n+1 ; $i--) {
            $sum = $sum +  $matrix[$xSize-1][$i];
            print_r($matrix[$xSize-1][$i] . " ");
        }

        $xSize--;
        for ($i=$xSize; $i > $m ; $i--) { 
            $sum = $sum +$matrix[$i][$n+1];
            print_r($matrix[$i][$n+1] . " ");
        }
        $n++;
        for ($i = $n; $i < $ySize-1; ++$i) {
            $sum = $sum +$matrix[$m+1][$i+1];
            print_r($matrix[$m+1][$i+1] . " ");
        }

        for ($i=$m+2; $i < $xSize-1 ; $i++) { 
            $sum = $sum +$matrix[$i][$ySize-1];
            print_r($matrix[$i][$ySize-1] . " ");
        }
        $xSize = $xSize-2;
        for ($i=$ySize-2; $i > $n+1 ; $i--) {
            print_r($matrix[$xSize][$i] . " ");
            $sum = $sum + $matrix[$xSize][$i];
        }
        $xSize--;
        return $sum;
}
 
$array = array(
    array(5, 3, 8, 9, 4, 1,3, -2),
    array(4, 6, 0, 3, 6, 4, 2, 1),
    array(4, -5, 3, 1, 9, 5, 6, 6),
    array(3, 7, 5, 3, 2, 8, 9, 4),
    array(5, 3, -3, 6, 6, 2, 8, 0),
    array(5, 7, 5, 3, 3, -9, 2, 2),
    array(0, 4, 3,2, 5, 7, 5, 4),

    );

$row = sizeof($array);
$col = sizeof($array[0]);
 
echo solution($row,$col,$array);
?>
</body>
</html>

