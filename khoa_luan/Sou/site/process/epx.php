<?php
	session_start();
	require'connect.php';
 	mysqli_query($connect, "SET NAMES 'utf8'");	
	$id_nha_si = $_GET['id_nha_si'];		
	$id_dich_vu = $_GET['id_dich_vu'];		
	$kinhnghiem = $_GET['kinhnghiem'];
	$query_create = "INSERT into trinh_do_tay_nghe(id_nha_si,id_dich_vu,kinh_nghiem) values ('$id_nha_si','$id_dich_vu','$kinhnghiem')";
	mysqli_query($connect,$query_create);
	unset($_SESSION['yeucau']);		
	header("Location: ../tay_nghe.php?idns='$id_nha_si'");
?>