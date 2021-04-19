<?php 

	$connect = mysqli_connect("localhost", "root", "", "luan_an");
 	mysqli_query($connect, "SET NAMES 'utf8'");
	$yeucau = $_GET['yeucau'];
	if($yeucau == 1) // nhận sử lý sự kiện CREATE 
	{

		$ten_nhom_dich_vu = $_GET['ten_nhom_dich_vu'];
		$mota_nhom_dich_vu = $_GET['mota_nhom_dich_vu'];

		$query_create = "INSERT into nhom_dich_vu VALUES ('','$ten_nhom_dich_vu','$mota_nhom_dich_vu')";
		mysqli_query($connect,$query_create);
		header("Location: ../list_nhom_dich_vu.php");		
		die();
	}
	else if($yeucau == 2) // nhan yeu cầu update
	{
		$id_nhom_dich_vu = $_GET['id_nhom_dich_vu'];
		$ten_nhom_dich_vu = $_GET['ten_nhom_dich_vu'];
		$mota_nhom_dich_vu = $_GET['mota_nhom_dich_vu'];
		echo $id_nhom_dich_vu;
		echo $ten_nhom_dich_vu;
		echo $mota_nhom_dich_vu;

		$query_create = "UPDATE nhom_dich_vu set ten_nhom_dich_vu = '$ten_nhom_dich_vu', mota_nhom_dich_vu = '$mota_nhom_dich_vu' where id_nhom_dich_vu = '$id_nhom_dich_vu'";
		mysqli_query($connect,$query_create);
		header("Location: ../list_nhom_dich_vu.php");		
		die();

	}
	else if($yeucau == 3) //nhan yeu cau delete
	{

		$id_nhom_dich_vu = $_GET['id_nhom_dich_vu'];
		//echo $id_nhom_dich_vu;
		$query_create = "DELETE from nhom_dich_vu where id_nhom_dich_vu = '$id_nhom_dich_vu'";
		mysqli_query($connect,$query_create);
		header("Location: ../list_nhom_dich_vu.php");		
		die();

	}

// $connect = mysqli_connect("localhost", "root", "", "luan_an");
// 	mysqli_query($connect, "SET NAMES 'utf8'");
// 	$connect = mysqli_connect("localhost","root","","luan_an");
	
// 	$query = "SELECT id_dich_vu,ten_dich_vu,nhom_dich_vu.ten_nhom_dich_vu,mota_dich_vu,hinh_anh_dich_vu,chiphi_dich_vu,thoi_gian_uoc_tinh from dich_vu join nhom_dich_vu on dich_vu.id_nhom_dich_vu = nhom_dich_vu.id_nhom_dich_vu  ";
// 	$data = mysqli_query($connect,$query);
// 	$arraydata = array();
// 			while ($row = mysqli_fetch_assoc($data)) {
// 			# code...
// 			array_push($arraydata, new Lists($row['id_dich_vu'],$row['ten_dich_vu'],$row['ten_nhom_dich_vu'],$row['chiphi_dich_vu'],$row['thoi_gian_uoc_tinh']));
// 					}
// 		echo json_encode($arraydata,256);

?>