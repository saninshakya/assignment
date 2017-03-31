<?php
 session_name("koreahouse");
 session_start();
 
 unset($_SESSION['ssuser_name']);
  unset($_SESSION['ssuser_role']); 
 echo "Logout successfully";
  echo "<script> window.location.assign('index.php'); </script>";
 ?>