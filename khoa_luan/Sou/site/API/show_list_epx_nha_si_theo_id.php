<?php 
	$id_nha_si = $_GET['id_nha_si'];
	$connect = mysqli_connect("localhost", "id15273651_id10563954_testgetjson", "Minhtam@12345@", "id15273651_khoaluan");
	mysqli_query($connect, "SET NAMES 'utf8'");	
	$query = "SELECT trinh_do_tay_nghe.id_nha_si,nha_si.ho_ten_nha_si,trinh_do_tay_nghe.id_dich_vu,dich_vu.ten_dich_vu,trinh_do_tay_nghe.kinh_nghiem, trinh_do_tay_nghe.thoi_gian_tao, trinh_do_tay_nghe.thoi_gian_cap_nhat_lan_cuoi from trinh_do_tay_nghe inner join nha_si on nha_si.id_nha_si=trinh_do_tay_nghe.id_nha_si inner join dich_vu on dich_vu.id_dich_vu= trinh_do_tay_nghe.id_dich_vu where trinh_do_tay_nghe.id_nha_si='$id_nha_si'";
	$data = mysqli_query($connect,$query);
	$arraydata = array();
			while ($row = mysqli_fetch_assoc($data)) {
			array_push($arraydata, new Lists($row['id_nha_si'],$row['ho_ten_nha_si'],$row['id_dich_vu'],$row['ten_dich_vu'],$row['kinh_nghiem'],$row['thoi_gian_tao'],$row['thoi_gian_cap_nhat_lan_cuoi']));
					}
		echo json_encode($arraydata,256);
class Lists
	{
		function __construct($id_nha_si,$ho_ten_nha_si,$id_dich_vu,$ten_dich_vu,$kinh_nghiem,$thoi_gian_tao,$thoi_gian_cap_nhat_lan_cuoi)
		
		{			
			$this->id_nha_si = $id_nha_si;
			$this->ho_ten_nha_si = $ho_ten_nha_si;
			$this->id_dich_vu = $id_dich_vu;		
			$this->ten_dich_vu = $ten_dich_vu;
			$this->kinh_nghiem = $kinh_nghiem;
			$this->thoi_gian_tao = $thoi_gian_tao;
			$this->thoi_gian_cap_nhat_lan_cuoi = $thoi_gian_cap_nhat_lan_cuoi;
			
			}
		}
?>