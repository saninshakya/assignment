 <?php
 session_name("koreahouse");
session_start(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AITSU-AIT_Calendar</title>
<link rel="stylesheet" href="style/documentation.css" type="text/css" />  

</head>

<body> 

<form name="loginForm" id="loginForm" method="post" action="loginform.php">
    Username: <input type="text" name="name" id="name">
    Password: <input type="password" name="pwd" id="pwd"> <br/>
    <input type="submit" name="login" id="login" value="Login"/>
</form>

 <?php 
  require_once('connection/config.php');

if(isset($_POST['name'])){
  $username = $_POST['name'];
  $password = $_POST['pwd'];   
   
 
 
  $con = mysqli_connect($server,$user_name,$pass,$database ) or die("Connection error: " . mysqli_error($con));
 $stmt = $con->prepare("SELECT username, role_id FROM ait_user WHERE username = ? AND password = ? LIMIT 1"); 
  $stmt->bind_param('ss', $username, $password); 
  $stmt->execute(); 
  $stmt->bind_result($username,$role_id); 
  $stmt->store_result();  
  if($stmt->num_rows == 1)
  { 
    if($stmt->fetch())
    {   
 
      $_SESSION['ssuser_name'] = $username;
      $_SESSION['ssuser_role'] = $role_id;       
      echo "<script> window.location.assign('index.php'); </script>";
    }
    
  }
  else {
    echo "*Wrong username or password";
  }
  $stmt->close();
}
else 
{   
}
//$con->close();
?>
 
</body>
</html>