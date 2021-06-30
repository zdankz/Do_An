<?php 
$connect = mysqli_connect("localhost", "id15273651_id10563954_testgetjson", "Minhtam@12345@", "id15273651_khoaluan");
mysqli_query($connect, "SET NAMES 'utf8'");
$connect = mysqli_connect("localhost", "id15273651_id10563954_testgetjson", "Minhtam@12345@", "id15273651_khoaluan");
$query_check_ns = "SELECT * from dich_vu";
$data = mysqli_query($connect,$query_check_ns);
$arraydata = array();
while ($row = mysqli_fetch_assoc($data)) {
			array_push($arraydata, new Lists($row['ten_dich_vu'],$row['mota_dich_vu'],$row['hinh_anh_dich_vu']));
		}
		echo json_encode($arraydata,256);
class Lists
	{
		function __construct($ten_dich_vu,$mota_dich_vu,$hinh_anh_dich_vu)
		{			
			$this->ten_dich_vu = $ten_dich_vu;		
			$this->mota_dich_vu = $mota_dich_vu;
			$this->hinh_anh_dich_vu = $hinh_anh_dich_vu;
		}
	}
?>