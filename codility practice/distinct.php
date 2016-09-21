<!-- Distinct
Compute number of distinct values in an array. -->.

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Test Demo</title>
        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    </head>
	<body>
    <?php
	    $array = array("2", "1", "1", "2", "3", "1");
	    $rslt = solution($array); 
	   

		function solution($N){
			$arrayUnique = array_unique($N);
			$distinctValue = count($arrayUnique);
			return $distinctValue;
		}
		?>
	</body>
</html>
