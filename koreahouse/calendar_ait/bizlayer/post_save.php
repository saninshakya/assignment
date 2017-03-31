<?php
	require_once('../connection/config.php');
	$object =$_POST['data'];
	$sql = "DELETE  FROM ait_event";
	$del_rslt=mysql_query($sql);
	if($del_rslt>0);
	$array = json_decode($object);

		foreach ($array as $key => $value) {
			$description =  $array[$key]->description;
			$clock =  $array[$key]->clock;
			$date = $array[$key]->date;
			$ymd= implode("-", array_reverse(explode("/", $date)));
			$qry = " INSERT INTO ait_event(description, date, clock) VALUES('$description', '$ymd', '$clock')";
			$rslt=mysql_query($qry);
			if($rslt>0){
				echo 'successfull';
			}
			else{
				echo "Not succesfull";
			}
		}
		exit(0);
		
	/*	$lastArray = end($array);



	$description =  $lastArray->description;
	$clock = $lastArray->clock;
	$c = $lastArray->date;

	$ymd= implode("-", array_reverse(explode("/", $c)));
	print_r($ymd);
	return;
		$qry = " INSERT INTO ait_event(description, date, clock) VALUES('$description', '$ymd', '$clock')";
		$rslt=mysql_query($qry);
		if($rslt>0){
			echo 'successfull';
		}
		else{
			echo "Not succesfull";
		}

		return;
*/
?>	