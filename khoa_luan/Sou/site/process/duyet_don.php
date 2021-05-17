<?php
	session_start();
	$role = $_SESSION['role'];
	require'connect.php';
	if($_GET['yeucau'] == 1 ){
		$id_don_dat_lich = $_GET['id_don_dat_lich'];
		$thoi_gian_dang_ky = $_GET['thoi_gian_dang_ky'];	
		$thoi_gian_du_tru_ket_thuc = $_GET['thoi_gian_du_tru_ket_thuc'];	
		$query_create = "UPDATE don_dat_lich set id_trang_thai = 2 where id_don_dat_lich = '$id_don_dat_lich'";
		mysqli_query($connect,$query_create);
		$query_in="INSERT into lich_lam_viec values ('$id_don_dat_lich','$thoi_gian_dang_ky','$thoi_gian_du_tru_ket_thuc','$role')";
		mysqli_query($connect,$query_in);
		header("Location: ../list_booking_wait.php");
	} 
	else {
		$id_don_dat_lich = $_GET['id_don_dat_lich'];
		$query_create = "UPDATE don_dat_lich set id_trang_thai = 3 where id_don_dat_lich = '$id_don_dat_lich'";
		mysqli_query($connect,$query_create);
		header("Location: ../list_booking_wait.php");
	}

?>