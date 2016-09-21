<!DOCTYPE html>
<html>
<head>
	<title>Monroe Quiz 2</title>
</head>
<body>
<?php
	    $a = '1234';
	    $b = '0';
	    $rslt = solution($a, $b); 

	    echo "output: ".$rslt;

		function solution($a, $b){

			$countA = strlen($a);
			$countB = strlen($b);
			echo ('A='.$a.'<br/>');
			echo ('B='.$b.'<br/>');

			$max = max($countA, $countB);
			// echo ('max='. $max);

			$strA = (string)$a;
			$strB = (string)$b;
			$output='';
			for ($i = 0; $i<$max; $i++){
				if ( isset($strA[$i]) )  {
		            $output = $output . $strA[$i];
		        }

		        if ( isset($strB[$i]) ) {
		            $output = $output . $strB[$i];
		        }

			}

			if ( (int)$output > 100000000 ) {
		        return -1;
		    } else {
		        return (int)$output;
		    }
			
		}
		?>
</body>
</html>