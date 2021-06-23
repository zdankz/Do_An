<?php
	session_start();
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	require'connect.php';
 	mysqli_query($connect, "SET NAMES 'utf8'");	
	$id_nha_si = $_GET['id_nha_si'];		
	$id_dich_vu = $_GET['id_dich_vu'];		
	$kinhnghiem = $_GET['kinhnghiem'];
	$time_create = date('Y-m-d H:i:s');
	$num = check_exit($id_nha_si,$id_dich_vu);
	if($num == 0){
		$query_create = "INSERT into trinh_do_tay_nghe(id_nha_si,id_dich_vu,kinh_nghiem,thoi_gian_tao,thoi_gian_cap_nhat_lan_cuoi) values ('$id_nha_si','$id_dich_vu','$kinhnghiem','$time_create','$time_create')";
			mysqli_query($connect,$query_create);
			header("Location: ../tay_nghe.php?idns='$id_nha_si'");
	}
	else {
		echo '<script>
		alert("Nha sĩ này đã có kinh nghiệm trong lĩnh vực này, vui lòng không thêm trùng");
		window.location.href="https://apptm.000webhostapp.com/khoa_luan/Sou/site/add_epx.php?id_nha_si='.$id_nha_si.'";
		</script>';		
	}
	

	function check_exit($nhasi,$dichvu)
	{
		require'connect.php';
		mysqli_query($connect, "SET NAMES 'utf8'");	
		$query_check = "SELECT * from trinh_do_tay_nghe where id_nha_si = '$nhasi' and id_dich_vu = '$dichvu'";
		$data = mysqli_query($connect,$query_check);
		return mysqli_num_rows($data);
	}
?>