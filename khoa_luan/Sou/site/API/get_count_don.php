<?php 
	$connect = mysqli_connect("localhost", "id15273651_id10563954_testgetjson", "Minhtam@12345@", "id15273651_khoaluan");
	mysqli_query($connect, "SET NAMES 'utf8'");
	$query = "CALL get_count()";
	$data = mysqli_query($connect,$query);
	$arraydata = array();
			while ($row = mysqli_fetch_assoc($data)) {
			# code...
			array_push($arraydata, new Lists($row['TONG']));
					}		
	$count = $arraydata[0]->tong;
	//	echo $count;	
	$count2 = list_wait();
	//echo $count2;
	class Lists
		{
			function __construct($tong)
			
			{			
				$this->tong = $tong;
				
				
				}
		}
	function list_wait()
		{
			$connect = mysqli_connect("localhost", "id15273651_id10563954_testgetjson", "Minhtam@12345@", "id15273651_khoaluan");
				mysqli_query($connect, "SET NAMES 'utf8'");				
				$query2 = "SELECT COUNT(id_don_dat_lich) AS TONG  from don_dat_lich where id_trang_thai =1";
				$data2 = mysqli_query($connect,$query2);
				$arraydata2 = array();
				while ($row = mysqli_fetch_assoc($data2)) {
						# code...
						array_push($arraydata2, new Lists($row['TONG']));
								}
				$count2 = $arraydata2[0]->tong;
				return $count2;			
		}	
?>