<!-- For example, given N = 1041 the function should return 5, because N has binary representation 10000010001 and so its longest binary gap is of length 5 -->.

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Test Demo</title>
        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    </head>
	<body>
    <?php
	    $number = 1041;
	    $rslt = solution($number); 
	    echo $rslt;

		function solution($N){
			$binaryGap = 0;
			$binary = decbin($N);
			$exploded = explode('1', $binary);
			unset($exploded[count($exploded) - 1]);
			unset($exploded[0]);
			foreach($exploded as $zeroes){
				$length = strlen($zeroes);
				if($length > $binaryGap)
				$binaryGap = $length;
			}
			return $binaryGap;
		}
		?>
	</body>
</html>
