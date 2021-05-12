<?php
	$data_nha_si = get_nha_si();
	$data_nhom_dich_vu = get_nhom_dich_vu();
	$data_khach_hang = get_khach_hang();	

	// $arraydata = array();
	// 		while ($row = mysqli_fetch_assoc($data_nha_si)) {
	// 		# code...
	// 		array_push($arraydata, new Lists($row['Id_nha_si'],$row['ho_ten_nha_si']));
	// 				}
	// 	echo json_encode($arraydata,256);
	
	function get_nha_si(){
		$con =connect();
		$query = "SELECT * from nha_si";
		$data = mysqli_query($con,$query);
		return $data;

	}
	function get_khach_hang(){
		$con =connect();
		$query = "SELECT * from khach_hang";
		$data = mysqli_query($con,$query);
		return $data;
	}
	function get_nhom_dich_vu(){
		$con =connect();
		$query = "SELECT * from nhom_dich_vu";
		$data = mysqli_query($con,$query);
		return $data;
	}
	// function get_dich_vu(){
	// 	$con =connect();
	// 	$query = "SELECT * from dich_vu";
	// 	$data = mysqli_query($con,$query);
	// 	return $data;
	// }
	function connect(){
		$connect = mysqli_connect("localhost", "id15273651_id10563954_testgetjson", "Minhtam@12345@", "id15273651_khoaluan");
		mysqli_query($connect, "SET NAMES 'utf8'");
		return $connect;
	}
	// class Listss
	// {
	// 	function __construct($id_nha_si,$ho_ten_nha_si)
		
	// 	{			
	// 		$this->id_nha_si = $id_nha_si;
	// 		$this->ho_ten_nha_si = $ho_ten_nha_si;
	// 		}
	// 	}
		
?>