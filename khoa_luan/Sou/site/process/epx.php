<?php
	session_start();
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	require'connect.php';
 	mysqli_query($connect, "SET NAMES 'utf8'");	
	$id_nha_si = $_GET['id_nha_si'];		
	$id_dich_vu = $_GET['id_dich_vu'];		
	$kinhnghiem = $_GET['kinhnghiem'];
	$time_create = date('Y-m-d H:i:s');
	$query_create = "INSERT into trinh_do_tay_nghe(id_nha_si,id_dich_vu,kinh_nghiem,thoi_gian_tao,thoi_gian_cap_nhat_lan_cuoi) values ('$id_nha_si','$id_dich_vu','$kinhnghiem','$time_create','$time_create')";
	mysqli_query($connect,$query_create);
	header("Location: ../tay_nghe.php?idns='$id_nha_si'");
?>