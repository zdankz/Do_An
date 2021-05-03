<?php
// $timeadding = "01:"
// $date = new Datetime("06:00:00");
// $date2 =  $date-> getTimestamp();
// echo $date2;

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
// $query = " UPDATE don_dat_lich inner join dich_vu on dich_vu.id_dich_vu = don_dat_lich.id_dich_vu SET don_dat_lich.thoi_gian_du_tru_ket_thuc = ADDTIME(don_dat_lich.thoi_gian_dang_ky,dich_vu.thoi_gian_uoc_tinh), don_dat_lich.chi_phi_uoc_tinh = dich_vu.chiphi_dich_vu"
// }


//===========================
// $str_time_bd = "09:50:00";
// $str_time = "01:00:00";


// $str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $str_time);

// sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);

// $time_seconds = $hours * 3600 + $minutes * 60 + $seconds;
// //echo $time_seconds;
// //echo "</br>";

// $batdau = new Datetime($str_time_bd);
// $time_bd = $batdau-> getTimestamp();
// //echo $time_bd;

// $add = $time_seconds + $time_bd;
// //echo "</br>	";
 //echo $add;
// $thoi_uoc_tinh = date('H:i:s',$add);
// //echo $thoi_uoc_tinh;
// return $thoi_uoc_tinh;
// date_default_timezone_set("Asia/Ho_Chi_Minh");
$date11 = "2020-25-4";

$originalDate = "2010-21-03";  
$newDate = date("Y-m-d", strtotime($originalDate));  
echo $newDate;

echo "ok";

?>