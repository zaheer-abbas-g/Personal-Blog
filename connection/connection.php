

	<?php
$host="localhost";
$username="root";
$password="";
$db_name="15778_zaheer_ahmed";

$connect=mysqli_connect($host,$username,$password,$db_name);

if (mysqli_connect_errno()) {
	
	echo"Error number".mysqli_connect_errno();
	echo"<br/>";
	echo"Error Message".mysqli_connect_error();
	die("Databse Connection Error");
}
?>	
