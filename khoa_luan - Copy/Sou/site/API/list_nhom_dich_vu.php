<?php 

	//$id_dv = $_GET['id_dich_vu'];
	$connect = mysqli_connect("localhost", "id15273651_id10563954_testgetjson", "Minhtam@12345@", "id15273651_khoaluan");
	mysqli_query($connect, "SET NAMES 'utf8'");

	$connect = mysqli_connect("localhost", "id15273651_id10563954_testgetjson", "Minhtam@12345@", "id15273651_khoaluan");
	// $query = "SELECT nha_si.id_nha_si, nha_si.ho_ten_nha_si, nha_si.gioi_tinh_nha_si,nha_si.so_dien_thoai_nha_si,nha_si.trinh_do_nha_si,nha_si.gioi_thieu_nha_si from nha_si join trinh_do_tay_nghe on trinh_do_tay_nghe.id_nha_si = nha_si.id_nha_si where trinh_do_tay_nghe.id_dich_vu = '$id_dv'";
	$query = "SELECT * from nhom_dich_vu ";
	$data = mysqli_query($connect,$query);
	$arraydata = array();
			while ($row = mysqli_fetch_assoc($data)) {
			# code...
			array_push($arraydata, new Lists($row['id_nhom_dich_vu'],$row['ten_nhom_dich_vu'],$row['mota_nhom_dich_vu']));
					}
		echo json_encode($arraydata,256);
class Lists
	{
		function __construct($id_nhom_dich_vu,$ten_nhom_dich_vu,$mota_nhom_dich_vu)
		
		{			
			$this->id_nhom_dich_vu = $id_nhom_dich_vu;
			$this->ten_nhom_dich_vu = $ten_nhom_dich_vu;
			$this->mota_nhom_dich_vu = $mota_nhom_dich_vu;
			}
		}
		
		





?>