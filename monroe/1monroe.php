<!DOCTYPE html>
<html>
<head>
	<title>Monroe Quiz 1</title>
</head>
<body>
<?php
// $s= "00-44  48 5555 8361";
// $s = "0 - 22 1985--324";
$s = "555372654";
$rslt = solution($s); 

echo $rslt;

function solution($string){
//Make alphanumeric (removes all other characters)
	$string = preg_replace("/[^0-9_\s-]/", "", $string);
//Clean up multiple dashes or whitespaces
	$string = preg_replace("/[\s-]+/", "", $string);
//Convert whitespaces and underscore to dash
	$string = preg_replace("/[\s_]/", "", $string);
	$rslt = implode("-", str_split($string, 3));

	if (strlen($rslt) % 4 === 1 ){
    	$rslt  = preg_replace( '/(\d)-(\d)$/', '-$1$2', $rslt );
    }
    return $rslt;
}

?>
</body>
</html>