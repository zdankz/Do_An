<?php

	$id_ns = $_GET['id_nha_si'];
	$id_nhomdv = $_GET['id_nhom_van_de'];

	$connect = mysqli_connect("localhost", "root", "", "luan_an");
	mysqli_query($connect, "SET NAMES 'utf8'");

	$connect = mysqli_connect("localhost","root","","luan_an");
	// $query = "SELECT dich_vu.id_dich_vu, dich_vu.ten_dich_vu,dich_vu.mota_dich_vu,dich_vu.hinh_anh_dich_vu,dich_vu.chiphi_dich_vu from dich_vu inner join trinh_do_tay_nghe on dich_vu.id_dich_vu = trinh_do_tay_nghe.id_dich_vu inner join nhom_dich_vu on nhom_dich_vu.id_nhom_dich_vu = dich_vu.id_nhom_dich_vu where trinh_do_tay_nghe.id_nha_si = '$id_ns' and nhom_dich_vu.id_nhom_dich_vu = '$id_nhomdv'";
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