<?php
	$connect = mysqli_connect("localhost", "root", "", "luan_an");
	mysqli_query($connect, "SET NAMES 'utf8'");

	$id_ndv = $_GET['key_nhom_dich_vu'];
	$connect = mysqli_connect("localhost","root","","luan_an");
	// $query = "SELECT  DISTINCT nha_si.id_nha_si,nha_si.ho_ten_nha_si,nha_si.gioi_tinh_nha_si,nha_si.so_dien_thoai_nha_si,nha_si.trinh_do_nha_si,nha_si.gioi_thieu_nha_si,nhom_dich_vu.id_nhom_dich_vu from nha_si join  trinh_do_tay_nghe on trinh_do_tay_nghe.id_nha_si = nha_si.id_nha_si inner join dich_vu on dich_vu.id_dich_vu = trinh_do_tay_nghe.id_dich_vu inner join nhom_dich_vu on nhom_dich_vu.id_nhom_dich_vu = dich_vu.id_nhom_dich_vu where nhom_dich_vu.id_nhom_dich_vu = '$id_ndv' ";
	$query = "CALL show_nha_si_theo_nhom_dich_vu('$id_ndv')";
	$data = mysqli_query($connect,$query);
	$arraydata = array();
			while ($row = mysqli_fetch_assoc($data)) {
			# code...
			array_push($arraydata, new Lists($row['id_nha_si'],$row['ho_ten_nha_si'],$row['gioi_tinh_nha_si'],$row['so_dien_thoai_nha_si'],$row['trinh_do_nha_si'],$row['gioi_thieu_nha_si'],$row['id_nhom_dich_vu']));

		}
		echo json_encode($arraydata,256);

			// }
	class Lists
	{
		function __construct($id_nha_si,$ho_ten_nha_si,$gioi_tinh_nha_si,$so_dien_thoai_nha_si,$trinh_do_nha_si,$gioi_thieu_nha_si,$id_nhom_dich_vu)

		{			
			$this->id_nha_si = $id_nha_si;
			$this->ho_ten_nha_si = $ho_ten_nha_si;
			$this->gioi_tinh_nha_si = $gioi_tinh_nha_si;		
			$this->so_dien_thoai_nha_si = $so_dien_thoai_nha_si;
			$this->trinh_do_nha_si = $trinh_do_nha_si;	
			$this->gioi_thieu_nha_si = $gioi_thieu_nha_si;	
			$this->id_nhom_dich_vu = $id_nhom_dich_vu;
		
		}
	}
?>