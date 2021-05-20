<?php 
	session_start();
	require'connect.php';
 	mysqli_query($connect, "SET NAMES 'utf8'");
 	$trang_thai = 4;
	if(isset($_SESSION['yeucau']) && $_SESSION['yeucau'] == 1) 
	{
			if(isset($_FILES['file'])){
				$error = arraY();
				$file = $_FILES['file'];
				$file_Name = $_FILES['file']['name'];
				$file_TpmName = $_FILES['file']['tmp_name'];
				$file_Size = $_FILES['file']['size'];			
				$file_Type = $_FILES['file']['type'];
				$tmp = explode('.', $_FILES['file']['name']);
				$file_Ext = strtolower(end($tmp));				
				$allowed = array('jpg','jpeg','png',);
				if(in_array($file_Ext, $allowed) == false){
					$error[] = "pless chosee image";
				}
				if(empty($error) == true){
					move_uploaded_file($file_TpmName, "uploads/" . $file_Name);
					$url = pathinfo($_SERVER['HTTP_REFERER']);
					$url['dirname'];
					$path = $url['dirname']."/process/uploads/" . $file_Name;					
				}							}	
		$id_nhom = $_POST['id_nhom_dich_vu'];		
		$ten_dich_vu = $_POST['ten_dich_vu'];		
		$mota_dich_vu = $_POST['mota_dich_vu'];		
		$chi_phi = $_POST['chiphi'];		
		$thoi_gian = $_POST['time'];		
		$query_create = "INSERT into dich_vu(id_nhom_dich_vu,ten_dich_vu,mota_dich_vu,hinh_anh_dich_vu,chiphi_dich_vu,thoi_gian_uoc_tinh,id_trang_thai) VALUES ('$id_nhom','$ten_dich_vu','$mota_dich_vu','$path','$chi_phi','$thoi_gian','$trang_thai')";
		mysqli_query($connect,$query_create);
		unset($_SESSION['yeucau']);		
		header("Location: ../list_dich_vu.php");
	}
	 if(isset($_SESSION['yeucau']) && $_SESSION['yeucau'] == 2) 
	{
			if(isset($_FILES['file'])){
				$error = arraY();
				$file = $_FILES['file'];
				$file_Name = $_FILES['file']['name'];
				$file_TpmName = $_FILES['file']['tmp_name'];
				$file_Size = $_FILES['file']['size'];				
				$file_Type = $_FILES['file']['type'];
				$tmp = explode('.', $_FILES['file']['name']);
				$file_Ext = strtolower(end($tmp));				
				$allowed = array('jpg','jpeg','png',);
				if(in_array($file_Ext, $allowed) == false){
					$error[] = "pless chosee image";
				}
				if(empty($error) == true){
					move_uploaded_file($file_TpmName, "uploads/" . $file_Name);
					$url = pathinfo($_SERVER['HTTP_REFERER']);
					$url['dirname'];
					$path = $url['dirname']."/process/uploads/" . $file_Name;					
				}							
			}	
		$id_dv = $_POST['id_dich_vu'];		
		$id_nhom = $_POST['id_nhom_dich_vu'];		
		$ten_dich_vu = $_POST['ten_dich_vu'];		
		$mota_dich_vu = $_POST['mota_dich_vu'];				
		$chi_phi = $_POST['chiphi'];			
		$thoi_gian = $_POST['time'];			
		$query_create = "UPDATE dich_vu SET id_nhom_dich_vu='$id_nhom',ten_dich_vu='$ten_dich_vu',mota_dich_vu='$mota_dich_vu',hinh_anh_dich_vu='$path',chiphi_dich_vu='$chi_phi',thoi_gian_uoc_tinh='$thoi_gian' WHERE id_dich_vu='$id_dv'";
		mysqli_query($connect,$query_create);
		unset($_SESSION['yeucau']);		
		header("Location: ../list_dich_vu.php");
	}
	if(isset($_GET['yeucau']) && $_GET['yeucau'] == 3)
	{
		$id_dich_vu = $_GET['id_dich_vu'];		
		$query_create = "UPDATE dich_vu set id_trang_thai = 5  where id_dich_vu = '$id_dich_vu'";
		mysqli_query($connect,$query_create);
		header("Location: ../list_dich_vu.php");
	}
?>