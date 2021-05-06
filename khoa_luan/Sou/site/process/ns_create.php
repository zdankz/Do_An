<?php 
	session_start();	
	require'connect.php';
 	mysqli_query($connect, "SET NAMES 'utf8'");
	if(isset($_SESSION['yeucau_ns']) && $_SESSION['yeucau_ns'] == 1) 
	{
			if(isset($_FILES['file'])){
				$error = arraY();
				$file = $_FILES['file'];
				$file_Name = $_FILES['file']['name'];
				$file_TpmName = $_FILES['file']['tmp_name'];
				$file_Size = $_FILES['file']['size'];
				//$fileError = $_FILES['file']['error'];
				$file_Type = $_FILES['file']['type'];
				$tmp = explode('.', $_FILES['file']['name']);
				$file_Ext = strtolower(end($tmp));
				//$fileActuaExt = strtolower(end($fileExt));
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
		$hoten = $_POST['hoten'];
		$gioitinh = $_POST['gioitinh'];
		$sdt = $_POST['sdt'];
		$trinhdo = $_POST['trinhdo'];			
		$gioithieu = $_POST['gioithieu'];
		$lich = implode("-", $_POST['lich']);
		$query_create = "INSERT into nha_si(ho_ten_nha_si,gioi_tinh_nha_si,so_dien_thoai_nha_si,trinh_do_nha_si,gioi_thieu_nha_si,hinh_anh_nha_si,lich_lam_viec_nha_si) VALUES ('$hoten','$gioitinh','$sdt','$trinhdo','$gioithieu','$path','$lich')";
		mysqli_query($connect,$query_create);
		unset($_SESSION['yeucau_ns']);		
		header("Location: ../list_nha_si.php");
	}
	 if(isset($_SESSION['yeucau_ns']) && $_SESSION['yeucau_ns'] == 2) 
	{
			if(isset($_FILES['file'])){
				$error = arraY();
				$file = $_FILES['file'];
				$file_Name = $_FILES['file']['name'];
				$file_TpmName = $_FILES['file']['tmp_name'];
				$file_Size = $_FILES['file']['size'];
				//$fileError = $_FILES['file']['error'];
				$file_Type = $_FILES['file']['type'];
				$tmp = explode('.', $_FILES['file']['name']);
				$file_Ext = strtolower(end($tmp));
				//$fileActuaExt = strtolower(end($fileExt));
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
		$id_nha_si = $_POST['id_nha_si'];
		$hoten = $_POST['hoten'];
		$gioitinh = $_POST['gioitinh'];
		$sdt = $_POST['sdt'];
		$trinhdo = $_POST['trinhdo'];
		$gioithieu = $_POST['gioithieu'];
		$lich = implode("-", $_POST['lich']);
		$query_create = "UPDATE nha_si SET ho_ten_nha_si ='$hoten',gioi_tinh_nha_si='$gioitinh',so_dien_thoai_nha_si='$sdt',trinh_do_nha_si ='$trinhdo',gioi_thieu_nha_si='$gioithieu', hinh_anh_nha_si='$path',lich_lam_viec_nha_si='$lich' WHERE id_nha_si = '$id_nha_si'";
		mysqli_query($connect,$query_create);
		unset($_SESSION['yeucau_ns']);		
		header("Location: ../list_nha_si.php");
	}
	if(isset($_GET['yeucau']) && $_GET['yeucau'] == 3)
	{
		$id_nha_si = $_GET['id_nha_si'];		
		$query_create = "DELETE from nha_si where id_nha_si = '$id_nha_si'";
		mysqli_query($connect,$query_create);
		header("Location: ../list_nha_si.php");
	}
?>