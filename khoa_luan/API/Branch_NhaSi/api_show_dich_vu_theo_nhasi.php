<?php

	$id_ns = $_GET['id_nha_si'];
	$id_nhomdv = $_GET['id_nhom_van_de'];
	$connect = mysqli_connect("localhost", "id15273651_id10563954_testgetjson", "Minhtam@12345@", "id15273651_khoaluan");
	mysqli_query($connect, "SET NAMES 'utf8'");
	$connect = mysqli_connect("localhost", "id15273651_id10563954_testgetjson", "Minhtam@12345@", "id15273651_khoaluan");
	$query = "CALL show_dich_vu_theo_nha_si('$id_ns','$id_nhomdv')";
	$data = mysqli_query($connect,$query);
	$arraydata = array();
			while ($row = mysqli_fetch_assoc($data)) {
			# code...
			array_push($arraydata, new Lists($row['id_dich_vu'],$row['ten_dich_vu'],$row['mota_dich_vu'],$row['hinh_anh_dich_vu'],$row['chiphi_dich_vu'],$row['thoi_gian_uoc_tinh'],$row['id_nha_si'],$row['ho_ten_nha_si']));
		}
		echo json_encode($arraydata,256);
class Lists
	{
		function __construct($id_dich_vu,$ten_dich_vu,$mota_dich_vu,$hinh_anh_dich_vu,$chiphi_dich_vu,$thoi_gian_uoc_tinh,$id_nha_si,$ho_ten_nha_si)

		{			
			$this->id_dich_vu = $id_dich_vu;
			$this->ten_dich_vu = $ten_dich_vu;
			$this->mota_dich_vu = $mota_dich_vu;		
			$this->hinh_anh_dich_vu = $hinh_anh_dich_vu;
			$this->chiphi_dich_vu = $chiphi_dich_vu;
			$this->thoi_gian_uoc_tinh = $thoi_gian_uoc_tinh;
			$this->id_nha_si = $id_nha_si;
			$this->ho_ten_nha_si = $ho_ten_nha_si;
		}
	}
?>