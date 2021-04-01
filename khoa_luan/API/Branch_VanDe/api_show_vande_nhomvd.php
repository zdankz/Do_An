<?php
	$connect = mysqli_connect("localhost", "root", "", "luan_an");
	mysqli_query($connect, "SET NAMES 'utf8'");

	$id_ndv = $_GET['key_nhom_dich_vu'];
	$connect = mysqli_connect("localhost","root","","luan_an");
	// $query = "SELECT  DISTINCT dich_vu.id_dich_vu,dich_vu.id_nhom_dich_vu, dich_vu.ten_dich_vu, dich_vu.mota_dich_vu,dich_vu.hinh_anh_dich_vu,dich_vu.chiphi_dich_vu from dich_vu where dich_vu.id_nhom_dich_vu = '$id_ndv' ";
	$query = "CALL show_van_de_theo_nhom_van_de('$id_ndv')";
	$data = mysqli_query($connect,$query);
	$arraydata = array();
			while ($row = mysqli_fetch_assoc($data)) {
			# code...
			array_push($arraydata, new Lists($row['id_dich_vu'],$row['id_nhom_dich_vu'],$row['ten_dich_vu'],$row['mota_dich_vu'],$row['hinh_anh_dich_vu'],$row['chiphi_dich_vu']));
			
		}
		echo json_encode($arraydata,256);

	class Lists
	{
		function __construct($id_dich_vu,$id_nhom_dich_vu,$ten_dich_vu,$mota_dich_vu,$hinh_anh_dich_vu,$chiphi_dich_vu)

		{			
			$this->id_dich_vu = $id_dich_vu;
			$this->id_nhom_dich_vu = $id_nhom_dich_vu;
			$this->ten_dich_vu = $ten_dich_vu;		
			$this->mota_dich_vu = $mota_dich_vu;
			$this->hinh_anh_dich_vu = $hinh_anh_dich_vu;	
			$this->chiphi_dich_vu = $chiphi_dich_vu;				
		}
	}
?>