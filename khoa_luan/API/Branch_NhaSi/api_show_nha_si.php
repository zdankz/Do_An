<?php 
$connect = mysqli_connect("localhost", "root", "", "luan_an");
mysqli_query($connect, "SET NAMES 'utf8'");
$connect = mysqli_connect("localhost","root","","luan_an");

$query_check_ns = "SELECT * from nha_si";

$data = mysqli_query($connect,$query_check_ns);
$arraydata = array();

while ($row = mysqli_fetch_assoc($data)) {
			# code...
			array_push($arraydata, new Lists($row['ho_ten_nha_si'],$row['gioi_tinh_nha_si'],$row['so_dien_thoai_nha_si'],$row['trinh_do_nha_si'],$row['gioi_thieu_nha_si'],$row['hinh_anh_nha_si'],$row['lich_lam_viec_nha_si']));

		}
		echo json_encode($arraydata,256);

class Lists
	{
		function __construct($ho_ten_nha_si,$gioi_tinh_nha_si,$so_dien_thoai_nha_si,$trinh_do_nha_si,$gioi_thieu_nha_si,$hinh_anh_nha_si,$lich_lam_viec_nha_si)

		{			
			$this->ho_ten_nha_si = $ho_ten_nha_si;
			$this->gioi_tinh_nha_si = $gioi_tinh_nha_si;		
			$this->so_dien_thoai_nha_si = $so_dien_thoai_nha_si;
			$this->trinh_do_nha_si = $trinh_do_nha_si;	
			$this->gioi_thieu_nha_si = $gioi_thieu_nha_si;
			$this->hinh_anh_nha_si = $hinh_anh_nha_si;
			$this->lich_lam_viec_nha_si = $lich_lam_viec_nha_si;

		}
	}
?>