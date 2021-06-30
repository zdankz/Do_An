<?php

	$id_dv = $_GET['id_dich_vu'];
	$connect = mysqli_connect("localhost", "id15273651_id10563954_testgetjson", "Minhtam@12345@", "id15273651_khoaluan");
	mysqli_query($connect, "SET NAMES 'utf8'");
	$connect = mysqli_connect("localhost", "id15273651_id10563954_testgetjson", "Minhtam@12345@", "id15273651_khoaluan");
	$query = "CALL show_nha_si_theo_van_de('$id_dv')";
	$data = mysqli_query($connect,$query);
	$arraydata = array();
			while ($row = mysqli_fetch_assoc($data)) {
			array_push($arraydata, new Lists($row['id_nha_si'],$row['ho_ten_nha_si'],$row['gioi_tinh_nha_si'],$row['so_dien_thoai_nha_si'],$row['trinh_do_nha_si'],$row['gioi_thieu_nha_si'],$row['hinh_anh_nha_si'],$row['lich_lam_viec_nha_si'],$row['id_dich_vu']));
					}
		echo json_encode($arraydata,256);
class Lists
	{
		function __construct($id_nha_si,$ho_ten_nha_si,$gioi_tinh_nha_si,$so_dien_thoai_nha_si,$trinh_do_nha_si,$gioi_thieu_nha_si,$hinh_anh_nha_si,$lich_lam_viec_nha_si,$id_dich_vu)		
		{			
			$this->id_nha_si = $id_nha_si;
			$this->ho_ten_nha_si = $ho_ten_nha_si;
			$this->gioi_tinh_nha_si = $gioi_tinh_nha_si;		
			$this->so_dien_thoai_nha_si = $so_dien_thoai_nha_si;
			$this->trinh_do_nha_si = $trinh_do_nha_si;	
			$this->gioi_thieu_nha_si = $gioi_thieu_nha_si;
			$this->hinh_anh_nha_si= $hinh_anh_nha_si;
			$this->lich_lam_viec_nha_si=$lich_lam_viec_nha_si;
			$this ->id_dich_vu=$id_dich_vu;	
		}
	}

?>