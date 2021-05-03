<?php
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	$sdt = $_GET['sodienthoai'];
	$hoten = $_GET['hovaten'];
	$id_nha_si = $_GET['id_nha_si'];
	$id_dich_vu = $_GET['id_dich_vu'];
	$thoi_gian_tao_don =  date('Y-m-d H:i:s');
	$ngay = $_GET['ngay'];
	$thoi_gian_dang_ky = $_GET['thoi_gian_dang_ky'];
	$thoi_gian_dang_ky = "".$ngay." ".$thoi_gian_dang_ky."";
	$thoi_gian_du_tru_ket_thuc = $_GET['thoi_gian_du_tru_ket_thuc'];
	$thoi_gian_du_tru_ket_thuc = "".$ngay." ".$thoi_gian_du_tru_ket_thuc."";
	$chi_phi_uoc_tinh = $_GET['chi_phi_uoc_tinh'];
	$trangthai = "";
	$list =array();
	$result = array();
	$connect = mysqli_connect("localhost", "id15273651_id10563954_testgetjson", "Minhtam@12345@", "id15273651_khoaluan");
	mysqli_query($connect, "SET NAMES 'utf8'");
	$connect = mysqli_connect("localhost","root","","luan_an");
	$query_check_sdt="SELECT id_khach_hang, so_dien_thoai  from khach_hang where so_dien_thoai = '$sdt'";
	$data = mysqli_query($connect, $query_check_sdt);    
		if((mysqli_num_rows($data) == 0)) {
			$trangthai = "Không tồn tại";
			$query_insert_new_kh = "INSERT into khach_hang values ('','$sdt','$hoten')";
			mysqli_query($connect,$query_insert_new_kh);

			$query_check_new = "SELECT id_khach_hang, so_dien_thoai  from khach_hang where so_dien_thoai = '$sdt'";
			$data = mysqli_query($connect, $query_check_new);
			$arraydata = array();
			while ($row = mysqli_fetch_assoc($data)) {
			# code...
			array_push($arraydata, new EIXST($row['id_khach_hang'],$row['so_dien_thoai']));			
				}
			$id_khach_hang = $arraydata[0]->id_khach_hang;
			$query_chen= "INSERT INTO don_dat_lich(id_nha_si,id_khach_hang,id_dich_vu,thoi_gian_tao_don,thoi_gian_dang_ky,thoi_gian_du_tru_ket_thuc,chi_phi_uoc_tinh) values ('$id_nha_si','$id_khach_hang','$id_dich_vu','$thoi_gian_tao_don','$thoi_gian_dang_ky','$thoi_gian_du_tru_ket_thuc','$chi_phi_uoc_tinh')";
		mysqli_query($connect,$query_chen);
		array_push($result,new CHECK('THANH CONG'));
		echo json_encode($result);
		} 
		else
		{	
			$trangthai = "Đã tồn tại";
			$arraydata = array();
			while ($row = mysqli_fetch_assoc($data)) {
			array_push($arraydata, new EIXST($row['id_khach_hang'],$row['so_dien_thoai']));	
				}
			$id_khach_hang = $arraydata[0]->id_khach_hang;
			$connect = mysqli_connect("localhost", "id15273651_id10563954_testgetjson", "Minhtam@12345@", "id15273651_khoaluan");
			$query_chen= "INSERT INTO don_dat_lich(id_nha_si,id_khach_hang,id_dich_vu,thoi_gian_tao_don,thoi_gian_dang_ky,thoi_gian_du_tru_ket_thuc,chi_phi_uoc_tinh) values ('$id_nha_si','$id_khach_hang','$id_dich_vu','$thoi_gian_tao_don','$thoi_gian_dang_ky','$thoi_gian_du_tru_ket_thuc','$chi_phi_uoc_tinh')";
			mysqli_query($connect,$query_chen);
			array_push($result,new CHECK('THANH CONG'));
		echo json_encode($result);			
		}
	class CHECK{
		 public function __construct($trangthai)
		{
			
			$this->trangthai = $trangthai;
		}
	}
	Class EIXST {
		 public function __construct($id_khach_hang,$so_dien_thoai)
		{
			$this->id_khach_hang = $id_khach_hang;
			$this->so_dien_thoai = $so_dien_thoai;
		}
	}	
?>