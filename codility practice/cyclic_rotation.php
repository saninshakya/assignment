<!-- For example, given N = 1041 the function should return 5, because N has binary representation 10000010001 and so its longest binary gap is of length 5 -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Test Demo</title>
        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    </head>
	<body>
    <?php
	    $numbers = array(3, 8, 9, 7, 6);
		  array_push($numbers, array_shift($numbers));
		  print_r($numbers);

		function solution($A, $K)
		{
			// shifted array
			$shifted = array();
			// number of elements
			$N = count($A);
			// if $K is bigger than $N, on $N-th shift we would be on starting position,
			// so it makes sense only to do smaller number of shifts than $N size
			$shiftedPositions = $K % $N;
			// initially first element position is 0, but at the end it will be K
			for($i = 0; $i < $N; $i++)
			{
				$position = $i + $shiftedPositions;
				if($position > $N - 1)
				$position = $position - $N;
				$shifted[$position] = $A[$i];
			}
			ksort($shifted);
			return $shifted;
		}
	?>
	</body>
</html>
