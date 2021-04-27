<?php
	$connect = mysqli_connect("localhost", "id15273651_id10563954_testgetjson", "Minhtam@12345@", "id15273651_khoaluan");
	mysqli_query($connect, "SET NAMES 'utf8'");
	$id_ndv = $_GET['key_nhom_dich_vu'];
	$connect = mysqli_connect("localhost", "id15273651_id10563954_testgetjson", "Minhtam@12345@", "id15273651_khoaluan");
	$query = "CALL show_van_de_theo_nhom_van_de('$id_ndv')";
	$data = mysqli_query($connect,$query);
	$arraydata = array();
			while ($row = mysqli_fetch_assoc($data)) {
			array_push($arraydata, new Lists($row['id_dich_vu'],$row['id_nhom_dich_vu'],$row['ten_dich_vu'],$row['mota_dich_vu'],$row['hinh_anh_dich_vu'],$row['chiphi_dich_vu'],$row['thoi_gian_uoc_tinh']));	
		}
		echo json_encode($arraydata,256);
	class Lists
	{
		function __construct($id_dich_vu,$id_nhom_dich_vu,$ten_dich_vu,$mota_dich_vu,$hinh_anh_dich_vu,$chiphi_dich_vu,$thoi_gian_uoc_tinh)

		{			
			$this->id_dich_vu = $id_dich_vu;
			$this->id_nhom_dich_vu = $id_nhom_dich_vu;
			$this->ten_dich_vu = $ten_dich_vu;		
			$this->mota_dich_vu = $mota_dich_vu;
			$this->hinh_anh_dich_vu = $hinh_anh_dich_vu;	
			$this->chiphi_dich_vu = $chiphi_dich_vu;
			$this->thoi_gian_uoc_tinh = $thoi_gian_uoc_tinh;				
		}
	}
?>