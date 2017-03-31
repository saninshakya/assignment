<?php
	$user_name = "root";
	$password = "";
	$database = "ait_su";
	$server = "127.0.0.1";

	$db_handle = mysql_connect($server, $user_name, $password) or die("ERROR:CONNECTION FAILED");
				mysql_select_db($database, $db_handle) or die("ERROR:CONNECTION FAILED");
?>

<?php
