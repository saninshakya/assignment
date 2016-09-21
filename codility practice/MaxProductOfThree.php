<!-- MaxProductOfThree -->.

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Test Demo</title>
        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    </head>
	<body>
    <?php
	    $array = array("-3", "1", "2", "-2", "5", "6");
	    $rslt = solution($array); 

	    echo $rslt;

		function solution($A){
			arsort($A);
			$product = 1;
			$counter = 0;
			$total = count($A);
			$max = null;
			foreach ($A as $key => $value) {
				if ($counter <= 2) {
					if (is_null($max)) 
						$max = $value;
						$product *= $value;
				}
				if ($counter >= $total-2) {
					$max *= $value;
				}
				$counter++;
			}
			return $product > $max ? $product : $max;
		}
		?>
	</body>
</html>
