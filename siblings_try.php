<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
/*$rslt = solution(122232200333222); 
echo $rslt;

function solution($N){

	$array = str_split($N);
	rsort($array);
	$arrlength=count($array);

	$max = array();

	for($x=0; $x < $arrlength; $x++)
	{
		array_push($max, $array[$x]);
	}

	return implode("",$max);
}*/

$rslt = solution(245); 
echo ($rslt);
function solution($N){
	$array = str_split($N);
	$length = count($array);
	for($i = 0; $i < $length; $i ++) {
		$max = $i;
		for($j = $i + 1; $j < $length; $j ++) {
			if ($array[$j] > $array[$max]) {
				$max = $j;
			}
		}
		$tmp = $array[$max];
		$array[$max] = $array[$i];
		$array[$i] = $tmp;
	}
	if ( (int)$N > 100000000 ) {
		return -1;
	} else {
		$result = implode("",$array);
		return (int)$result;

	}
}
?>

</body>
</html>