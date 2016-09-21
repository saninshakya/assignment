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
  		$array = array("9", "3", "9", "3", "9", "7", "9");

  		$rslt = solution($array);
  		// print_r($rslt);

		function solution($A)
		{
		// we'll count repetitions, integer which is not repeated is unpaired element
		$integerCount = array();
			foreach($A as $value)
			{
				if(!isset($integerCount[$value]))
					$integerCount[$value] = 0;
				$integerCount[$value]++;
				// if we have pair, we can remove it so only unpaired element will remain in the array
				if($integerCount[$value] == 2)
					unset($integerCount[$value]);
			}
		$unpaired = key($integerCount);
		return $unpaired;
		}
		?>
	</body>
</html>
