<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$array = array(9, 4, -3, -10);
$rslt = solution($array); 
echo $rslt;

function solution($A){
	$avg = array_sum($A)/count($A);

	$extremeElement = 0;
	for($i = 0; $i < count($A); $i++){
		if (abs($avg - $A[$i]) > $extremeElement):
			$extremeElement = $i;
		endif;
	}
	if ( (int)$extremeElement > 100000000 ) {
		return -1;
	} else {
		return (int)$extremeElement;
	}
}
?>

</body>
</html>