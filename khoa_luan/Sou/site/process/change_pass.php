<?php 

$pass = $_POST['pass'];

	$connect = mysqli_connect("localhost", "root", "", "luan_an");
	mysqli_query($connect, "SET NAMES 'utf8'");

	$connect = mysqli_connect("localhost","root","","luan_an");
	
	$query = "UPDATE account set password = '$pass' where role =1";
	$data = mysqli_query($connect,$query);
	header("Location: ./process_logout.php");
	die();

?>