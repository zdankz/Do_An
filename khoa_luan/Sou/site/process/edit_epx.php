<?php
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");
require'connect.php';
$id_dich_vu = $_GET['id_dich_vu'];
$id_nha_si  = $_GET['id_nha_si'];
$kn = $_GET['kinhnghiem'];
$time_create = date('Y-m-d H:i:s');
$query_create = "UPDATE trinh_do_tay_nghe set kinh_nghiem ='$kn' , thoi_gian_cap_nhat_lan_cuoi = '$time_create' where id_nha_si = '$id_nha_si' and id_dich_vu = '$id_dich_vu' ";
mysqli_query($connect,$query_create);
header("Location: ../tay_nghe.php?idns='$id_nha_si'");
?>