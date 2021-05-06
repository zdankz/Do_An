<?php
	require'connect.php';
	$id_nha_si = $_GET['id_nha_si'];
	$id_dich_vu = $_GET['id_dich_vu'];			
	$query_create = "DELETE from trinh_do_tay_nghe where id_nha_si = '$id_nha_si' and id_dich_vu = '$id_dich_vu'";
	mysqli_query($connect,$query_create);
	header("Location: ../tay_nghe.php?idns='$id_nha_si'");
?>