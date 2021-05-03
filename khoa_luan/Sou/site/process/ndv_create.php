<?php 
	require'connect.php';
 	mysqli_query($connect, "SET NAMES 'utf8'");
	$yeucau = $_GET['yeucau'];
	if($yeucau == 1) 
	{
		$ten_nhom_dich_vu = $_GET['ten_nhom_dich_vu'];
		$mota_nhom_dich_vu = $_GET['mota_nhom_dich_vu'];
		$query_create = "INSERT into nhom_dich_vu(ten_nhom_dich_vu,mota_nhom_dich_vu) VALUES ('$ten_nhom_dich_vu','$mota_nhom_dich_vu')";
		mysqli_query($connect,$query_create);
		header("Location: ../list_nhom_dich_vu.php");
	}
	else if($yeucau == 2) // nhan yeu cầu update
	{
		$id_nhom_dich_vu = $_GET['id_nhom_dich_vu'];
		$ten_nhom_dich_vu = $_GET['ten_nhom_dich_vu'];
		$mota_nhom_dich_vu = $_GET['mota_nhom_dich_vu'];		
		$query_create = "UPDATE nhom_dich_vu set ten_nhom_dich_vu = '$ten_nhom_dich_vu', mota_nhom_dich_vu = '$mota_nhom_dich_vu' where id_nhom_dich_vu = '$id_nhom_dich_vu'";
		mysqli_query($connect,$query_create);
		header("Location: ../list_nhom_dich_vu.php");		
	}
	else if($yeucau == 3)
	{
		$id_nhom_dich_vu = $_GET['id_nhom_dich_vu'];		
		$query_create = "DELETE from nhom_dich_vu where id_nhom_dich_vu = '$id_nhom_dich_vu'";
		mysqli_query($connect,$query_create);
		header("Location: ../list_nhom_dich_vu.php");
	}
?>