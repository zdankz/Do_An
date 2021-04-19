<?php 
// $du_lieu_tra_ve_json = file_get_contents("http://localhost/khoa_luan/API/fun_process/register.php?sodienthoai=0766589630");

// echo $du_lieu_tra_ve_json;
$time_dexuat = new datetime('18:00:00');
$time_dexuat = $time_dexuat -> getTimestamp();
echo $time_dexuat;
echo '</br>';
$time_dexuat12 = new datetime('20:00:00');
$time_dexuat12 = $time_dexuat12 -> getTimestamp();
echo $time_dexuat12;

if($time_dexuat > $time_dexuat12){
	echo "dc duyet";
} else {
	echo "k ";
}

?>