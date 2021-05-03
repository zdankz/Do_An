<?php 
require'connect.php';
$pass = $_POST['pass'];
	mysqli_query($connect, "SET NAMES 'utf8'");	
	$query = "UPDATE account set password = '$pass' where role =1";
	$data = mysqli_query($connect,$query);
	header("Location: ./process_logout.php");
	die();
?>