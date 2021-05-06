<?php 
	$connect = mysqli_connect("localhost", "id15273651_id10563954_testgetjson", "Minhtam@12345@", "id15273651_khoaluan");
	mysqli_query($connect, "SET NAMES 'utf8'");
	$query = "SELECT don_dat_lich.id_don_dat_lich,khach_hang.ho_ten_khach_hang,nha_si.ho_ten_nha_si,dich_vu.ten_dich_vu,don_dat_lich.thoi_gian_tao_don,don_dat_lich.thoi_gian_dang_ky,don_dat_lich.thoi_gian_du_tru_ket_thuc,don_dat_lich.chi_phi_uoc_tinh from don_dat_lich JOIN nha_si on nha_si.Id_nha_si= don_dat_lich.id_nha_si JOIN dich_vu on dich_vu.id_dich_vu = don_dat_lich.id_dich_vu join khach_hang on khach_hang.id_khach_hang = don_dat_lich.id_khach_hang where don_dat_lich.id_trang_thai =1";
	$data = mysqli_query($connect,$query);
	$arraydata = array();
			while ($row = mysqli_fetch_assoc($data)) {
			# code...
			array_push($arraydata, new Lists($row['id_don_dat_lich'],$row['ho_ten_khach_hang'],$row['ho_ten_nha_si'],$row['ten_dich_vu'],$row['thoi_gian_tao_don'],$row['thoi_gian_dang_ky'],$row['thoi_gian_du_tru_ket_thuc'],$row['chi_phi_uoc_tinh']));
					}
		echo json_encode($arraydata,256);
	//$count = $arraydata[0]->tong;
	//echo $count;	
	class Lists
	{
		function __construct($id_don_dat_lich,$ho_ten_khach_hang,$ho_ten_nha_si,$ten_dich_vu,$thoi_gian_tao_don,$thoi_gian_dang_ky,$thoi_gian_du_tru_ket_thuc,$chi_phi_uoc_tinh)		
		{			
			$this->id_don_dat_lich = $id_don_dat_lich;
			$this->ho_ten_khach_hang = $ho_ten_khach_hang;	
			$this->ho_ten_nha_si = $ho_ten_nha_si;	
			$this->ten_dich_vu = $ten_dich_vu;	
			$this->thoi_gian_tao_don = $thoi_gian_tao_don;	
			$this->thoi_gian_dang_ky = $thoi_gian_dang_ky;	
			$this->thoi_gian_du_tru_ket_thuc = $thoi_gian_du_tru_ket_thuc;	
			$this->chi_phi_uoc_tinh = $chi_phi_uoc_tinh;						
		}
	}
?>