<?php 
	session_start();
	require'connect.php';
	require "API/get_count_don.php";
	if(!isset($_SESSION['role'])){
		header("Location: login.php");
	}	
		if($_SESSION['role'] ==1 ){
		    $role = "Admin";
		    $xem = "";
		}else {
		    $role = "Sales";
		    $xem = "hidden='''";
		}
	$obj = get_yc();
	// ========Kiểm tra đầu vào là ở y/c nào
	if($obj == "Khách Hàng"){
		if(isset($_GET['submit']))
		{
    	$q = $_GET['q'];
    	$result = rest_data_kh($q);
    	//mysqli_close($connect);
    	}
    }
    elseif ($obj =="Nha Sĩ") {  	
    	if(isset($_GET['submit']))
    	{
	    $q = check_sub();
	    $result = rest_data_ns($q);
   		}

	}
	elseif ($obj =="Nhóm Dịch Vụ") {  	
    	if(isset($_GET['submit']))
    	{
	    $q = check_sub();
	    $result = rest_data_ndv($q);
   		}

	}
	elseif ($obj =="Dịch Vụ") {  	
    	if(isset($_GET['submit']))
    	{
	    $q = check_sub();
	    $result = rest_data_dv($q);
   		}

	}
    #====================== RESST DATA =========================
    function rest_data_kh($q){
	    $connect = mysqli_connect("localhost", "id15273651_id10563954_testgetjson", "Minhtam@12345@", "id15273651_khoaluan");
	    $result = mysqli_query($connect,"SELECT * FROM khach_hang where id_khach_hang like '%$q%' or ho_ten_khach_hang like '%$q%' or so_dien_thoai like '%$q%'");
	    return $result;
	}
	function rest_data_ns($q){
	    $connect = mysqli_connect("localhost", "id15273651_id10563954_testgetjson", "Minhtam@12345@", "id15273651_khoaluan");
	    $result = mysqli_query($connect,"SELECT * FROM nha_si where id_nha_si like '%$q%' or ho_ten_nha_si like '%$q%' or gioi_tinh_nha_si like '%$q%' or so_dien_thoai_nha_si like  '%$q%' or trinh_do_nha_si like '%$q%' or gioi_thieu_nha_si like '%$q%' or lich_lam_viec_nha_si like '%$q%'");
	    return $result;
	}
	function rest_data_ndv($q){
	    $connect = mysqli_connect("localhost", "id15273651_id10563954_testgetjson", "Minhtam@12345@", "id15273651_khoaluan");
	    $result = mysqli_query($connect,"SELECT * FROM nhom_dich_vu where id_nhom_dich_vu like '%$q%' or ten_nhom_dich_vu like '%$q%' or mota_nhom_dich_vu like '%$q%'");
	    return $result;
	}
	function rest_data_dv($q){
	    $connect = mysqli_connect("localhost", "id15273651_id10563954_testgetjson", "Minhtam@12345@", "id15273651_khoaluan");
	    $result = mysqli_query($connect,"SELECT * FROM dich_vu where id_dich_vu like '%$q%' or ten_dich_vu like '%$q%' or mota_dich_vu like '%$q%' or chiphi_dich_vu like '%$q%' or thoi_gian_uoc_tinh like '%$q%'");
	    return $result;
	}

	function get_yc(){
		$yc = $_GET['yc'];
		if($yc == "k_h"){
		    $obj = "Khách Hàng";
		}
		elseif ($yc == "n_s") {
		    $obj = "Nha Sĩ";
		} 
		elseif($yc == "ndv"){
			$obj = "Nhóm Dịch Vụ";	
		}
		elseif ($yc == "dv") {
		    $obj = "Dịch Vụ";
		} 
		elseif ($yc == "d_d_l") {
		    $obj = "Đơn Đặt Lịch";
		}
		return $obj;
	}
	function check_sub(){
		if(isset($_GET['submit'])){
    	$q = $_GET['q'];
    	return $q;
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