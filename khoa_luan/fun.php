<?php
// $timeadding = "01:"
$date = new Datetime("06:00:00");
$date2 =  $date-> getTimestamp();
echo $date2;

// $date2 = getdate($date2);
// // in ra ngay
//echo $date2['weekday'];
// $test = "2021-4-2 05:00:00";
// convertotimestamp($test);

// function convertotimestamp($date){
// 	$thoigian  = new Datetime($date);
// 	$thoigian_con_stamp = $thoigian -> getTimestamp();
// 	return $thoigian_con_stamp;
// }

// function addstamp($timeadding,$date)
// {	
// 	$thoigian  = new Datetime($date);
// 	$thoigian_con_stamp = $thoigian -> getTimestamp();
$query = " UPDATE don_dat_lich inner join dich_vu on dich_vu.id_dich_vu = don_dat_lich.id_dich_vu SET don_dat_lich.thoi_gian_du_tru_ket_thuc = ADDTIME(don_dat_lich.thoi_gian_dang_ky,dich_vu.thoi_gian_uoc_tinh), don_dat_lich.chi_phi_uoc_tinh = dich_vu.chiphi_dich_vu"





// }



?>