<?php 

	function check_submit()
	{
		if(isset($_GET['submit']))
		{
			
			$id_khach_hang = $_GET['id_khach_hang'];
			$id_nha_si = $_GET['id_nha_si'];
			$id_nhom_dich_vu = $_GET['id_nhom_dich_vu'];
			$id_trang_thai = $_GET['id_trang_thai'];
			$time_create = $_GET['time_create'];
			$time_from = $_GET['time_from'];
			$time_to = $_GET['time_to'];
			if( $id_khach_hang != "" || $id_nha_si !="" || $id_nhom_dich_vu !="" || $id_trang_thai != "" || $time_from != "" || $time_to != "" || $time_create != "")
			{
				$data = search_data($id_khach_hang,$id_nha_si,$id_nhom_dich_vu,$id_trang_thai,$time_from,$time_to,$time_create);
			}

			return $data;
		}
	}

	#get data search cho filter.
	function search_data($id_khach_hang,$id_nha_si,$id_nhom_dich_vu,$id_trang_thai,$time_from,$time_to,$time_create)
	{
		require "connect.php";
		
		$query = "SELECT don_dat_lich.id_don_dat_lich, don_dat_lich.thoi_gian_dang_ky,nha_si.ho_ten_nha_si, khach_hang.ho_ten_khach_hang, nhom_dich_vu.ten_nhom_dich_vu,trang_thai.ten_trang_thai from don_dat_lich join khach_hang on khach_hang.id_khach_hang = don_dat_lich.id_khach_hang join nha_si on nha_si.id_nha_si = don_dat_lich.id_nha_si join dich_vu on dich_vu.id_dich_vu = don_dat_lich.id_dich_vu join nhom_dich_vu on dich_vu.id_nhom_dich_vu = nhom_dich_vu.id_nhom_dich_vu join trang_thai on trang_thai.id_trang_thai = don_dat_lich.id_trang_thai where  khach_hang.id_khach_hang = '$id_khach_hang' OR don_dat_lich.id_nha_si = '$id_nha_si' OR dich_vu.id_nhom_dich_vu = '$id_nhom_dich_vu' OR don_dat_lich.id_trang_thai = '$id_trang_thai' OR date(don_dat_lich.thoi_gian_dang_ky) = '$time_create' OR date(don_dat_lich.thoi_gian_dang_ky) between '$time_from' and '$time_to'";
		$data = mysqli_query($connect,$query) or die('error');
		return $data;
		
	}
?>