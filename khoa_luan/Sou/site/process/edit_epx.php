<?php
session_start();
require'connect.php';
$id_dich_vu = $_GET['id_dich_vu'];
$id_nha_si  = $_GET['id_nha_si'];
$kn = $_GET['kinhnghiem'];
$query_create = "UPDATE trinh_do_tay_nghe set kinh_nghiem ='$kn' where id_nha_si = '$id_nha_si' and id_dich_vu = '$id_dich_vu' ";
mysqli_query($connect,$query_create);
header("Location: ../tay_nghe.php?idns='$id_nha_si'");
?>