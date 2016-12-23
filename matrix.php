<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$array = array(
	array(5, 3, 8, 9, 4, 1,3, -2),
	array(4, 5, 0, 3, 6, 4, 2, 1),
	array(4, -5, 3, 1, 9, 5, 6, 6),
	array(3, 7, 5, 3, 2, 8, 9, 4),
	array(5, 3, -3, 6, 6, 2, 8, 0),
	array(5, 7, 5, 3, 3, -9, 2, 2),
	array(0, 4, 3,2, 5, 7, 5, 4),

	);
echo '<pre>';
print_r($array);
echo '</pre>';

$row = sizeof($array);
$col = sizeof($array[0]);

$rslt = spiralPath($row, $col, $array);

function spiralPath($m, $n, $array){
	$i=0; $k = 0; $l = 0;
		/*k - starting row index
		m - ending row index
		l - starting column index
		n - ending column index
		i - iterator*/
		while($k<$m && $l<$n){
			for($i=$l; $i<$n;++$i)
			 {
			 	echo($array[$k][$i]+" ");
			 }
			 $k++;
			 echo '<br>';

			 for($i = $k;$i<$m-1;++$i)
			 {
			 	echo($array[$i][$n-1]+" ");
			 }
			 $n--;
			 echo '<br>';


			 if($l<$m)
			 {
			 	for($i = $m-1; $i>= $k-1; --$i)
			 	{
			 		echo($array[$i][$l]+" ");
			 	}
			 	$l++;
			 }
			 echo '<br>';

		}
	}
?>

</body>
</html>