<?php 
	$connect = mysqli_connect("localhost", "id15273651_id10563954_testgetjson", "Minhtam@12345@", "id15273651_khoaluan");
	mysqli_query($connect, "SET NAMES 'utf8'");

	$connect = mysqli_connect("localhost", "id15273651_id10563954_testgetjson", "Minhtam@12345@", "id15273651_khoaluan");	
	$query = "SELECT id_dich_vu,ten_dich_vu,nhom_dich_vu.ten_nhom_dich_vu,mota_dich_vu,hinh_anh_dich_vu,chiphi_dich_vu,thoi_gian_uoc_tinh from dich_vu join nhom_dich_vu on dich_vu.id_nhom_dich_vu = nhom_dich_vu.id_nhom_dich_vu  ";
	$data = mysqli_query($connect,$query);
	$arraydata = array();
			while ($row = mysqli_fetch_assoc($data)) {
			# code...
			array_push($arraydata, new Lists($row['id_dich_vu'],$row['ten_dich_vu'],$row['ten_nhom_dich_vu'],product_price($row['chiphi_dich_vu']),$row['thoi_gian_uoc_tinh']));
					}
		echo json_encode($arraydata,256);
class Lists
	{
		function __construct($id_dich_vu,$ten_dich_vu,$ten_nhom_dich_vu,$chiphi_dich_vu,$thoi_gian_uoc_tinh)
		
		{			
			$this->id_dich_vu = $id_dich_vu;
			$this->ten_dich_vu = $ten_dich_vu;
			$this->ten_nhom_dich_vu = $ten_nhom_dich_vu;			
			$this->chiphi_dich_vu = $chiphi_dich_vu;
			$this->thoi_gian_uoc_tinh = $thoi_gian_uoc_tinh;			
			}
	}

function product_price($priceFloat) {
	$symbol = 'VND';
	$symbol_thousand = '.';
	$decimal_place = 0;
	$price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);
	return $price.$symbol;
}
?>