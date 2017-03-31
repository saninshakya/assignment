<?php
	$user_name = "root";
	$pass = "";
	$database = "ait_su";
	$server = "localhost";
$server = "localhost"; 
				 $db_handle = mysql_connect($server, $user_name, $pass,$database) or die("ERROR:CONNECTION FAILED");
		 	mysql_select_db($database, $db_handle) or die("ERROR:CONNECTION FAILED");
			
?>