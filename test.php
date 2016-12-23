<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

$array = [[5, 3, 8, 9, 4, 1, 3, -2], [4, 6, 0, 3, 6, 4, 2, 1], [4, -5, 3, 1, 9, 5, 6, 6], [3, 7, 5, 3, 2, 8, 9, 4], [5, 3, -3, 6, 3, 2, 8, 0], [5, 7, 5, 3, 3, -9, 2, 2], [0, 4, 3, 2, 5, 7, 5, 4]];


 
echo solution($array);

function solution($A) {

    $xSize = sizeof($A);
    $ySize = sizeof($A[0]);
    $m = 0;
    $n = 0;
    // $xSize--;
    // $ySize--;
    $sum = 0;

        for ($i = $n; $i <= $ySize; ++$i) {
            $sum = $sum + $A[$m][$i];
        }
        $m++;
        for ($i=$m; $i <= $xSize-1 ; $i++) { 
            $sum = $sum + $A[$i][$ySize];
        }
        $ySize--;
        for ($i=$ySize; $i > $n+1 ; $i--) {
            $sum = $sum +  $A[$xSize-1][$i];
        }

        $xSize--;
        for ($i=$xSize; $i > $m ; $i--) { 
            $sum = $sum +$A[$i][$n+1];
        }
        $n++;


        for ($i = $n; $i < $ySize-1; ++$i) {
            $sum = $sum +$A[$m+1][$i+1];
        }

        for ($i=$m+2; $i < $xSize-1 ; $i++) { 
            $sum = $sum +$A[$i][$ySize-1];
        }
        $xSize = $xSize-2;
        for ($i=$ySize-2; $i > $n+1 ; $i--) {
            $sum = $sum + $A[$xSize][$i];
        }
        $xSize--;
        return $sum;
}
 

?>
</body>
</html>

