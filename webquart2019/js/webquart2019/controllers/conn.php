<?php  
require "DB.php";

$conn = new mysqli(host,username,password,db);
if ($conn->connect_error) {
	//echo "fail";
	die('Database error:'. $conn->connect_error);
}
?>