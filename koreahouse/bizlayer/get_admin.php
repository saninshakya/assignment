<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ait_su";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "select u.username, r.user_role from ait_user as u LEFT JOIN ait_role as r ON u.role_id = r.id
";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo $row["user_role"]. " - Name: ". $row["username"] . "<br>";
     }
} else {
     echo "0 results";
}

$conn->close();
?>