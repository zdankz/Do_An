<?php 
	session_start();
	require'connect.php';
	$pass = $_POST['pass'];
	$role =  $_SESSION['role'];
	mysqli_query($connect, "SET NAMES 'utf8'");	
	$query = "UPDATE account set password = '$pass' where role = '$role'";
	$data = mysqli_query($connect,$query);
	header("Location: ./process_logout.php");
	die();
?>