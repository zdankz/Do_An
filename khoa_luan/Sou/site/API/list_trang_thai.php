<?php 
	$connect = mysqli_connect("localhost", "id15273651_id10563954_testgetjson", "Minhtam@12345@", "id15273651_khoaluan");
	mysqli_query($connect, "SET NAMES 'utf8'");	
	$query = "SELECT * from trang_thai";
	$data = mysqli_query($connect,$query);
	$arraydata = array();
			while ($row = mysqli_fetch_assoc($data)) {
			# code...
			array_push($arraydata, new Lists($row['id_trang_thai'],$row['ten_trang_thai']));
					}
		echo json_encode($arraydata,256);
class Lists
	{
		function __construct($id_trang_thai,$ten_trang_thai)		
		{			
			$this->id_trang_thai = $id_trang_thai;
			$this->ten_trang_thai = $ten_trang_thai;				
		}
	}


?>