<?php 

	$idns = $_GET['idns'];

	$connect = mysqli_connect("localhost", "root", "", "luan_an");
	mysqli_query($connect, "SET NAMES 'utf8'");

	$connect = mysqli_connect("localhost","root","","luan_an");
	
	$query = "SELECT khach_hang.ho_ten_khach_hang, dich_vu.ten_dich_vu,don_dat_lich.thoi_gian_dang_ky, don_dat_lich.thoi_gian_du_tru_ket_thuc from don_dat_lich join khach_hang on khach_hang.id_khach_hang = don_dat_lich.id_khach_hang join dich_vu on dich_vu.id_dich_vu = don_dat_lich.id_dich_vu where don_dat_lich.id_nha_si = '$idns'";
	$data = mysqli_query($connect,$query);
	$arraydata = array();
			while ($row = mysqli_fetch_assoc($data)) {
			# code...
			array_push($arraydata, new Lists($row['ho_ten_khach_hang'],$row['ten_dich_vu'],$row['thoi_gian_dang_ky'],$row['thoi_gian_du_tru_ket_thuc']));
					}
		echo json_encode($arraydata,256);
class Lists
	{
		function __construct($ho_ten_khach_hang,$ten_dich_vu,$thoi_gian_dang_ky,$thoi_gian_du_tru_ket_thuc)
		
		{			
			$this->ho_ten_khach_hang = $ho_ten_khach_hang;
			$this->ten_dich_vu = $ten_dich_vu;
			$this->thoi_gian_dang_ky = $thoi_gian_dang_ky;		
			$this->thoi_gian_du_tru_ket_thuc = $thoi_gian_du_tru_ket_thuc;
			
			}
		}
		
		





?>