<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php
	    $array = array("5", "2", "4", "6", "3", "7");
	    $rslt = solution($array); 

	    echo $rslt;

		function solution($A){
			$count = count($A);
			$cost = array();
			for ($p = 0; $p < $count-1; $p++) {
				for ($q = 0; $q < $count-1; $q++){
					if (($q - $p) > 1){
						$cost[$p] = $A[$p] + $A[$q];
					}
				}
			}
			return min($cost);
		}
	?>

</body>
</html>