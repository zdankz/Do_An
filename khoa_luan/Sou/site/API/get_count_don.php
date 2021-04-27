<?php 

	//$idns = $_GET['idns'];

	$connect = mysqli_connect("localhost", "id15273651_id10563954_testgetjson", "Minhtam@12345@", "id15273651_khoaluan");
	mysqli_query($connect, "SET NAMES 'utf8'");

	$connect = mysqli_connect("localhost", "id15273651_id10563954_testgetjson", "Minhtam@12345@", "id15273651_khoaluan");
	
	$query = "CALL get_count()";
	$data = mysqli_query($connect,$query);
	$arraydata = array();
			while ($row = mysqli_fetch_assoc($data)) {
			# code...
			array_push($arraydata, new Lists($row['TONG']));
					}
		//echo json_encode($arraydata,256);
	$count = $arraydata[0]->tong;
	//echo $count;	
class Lists
	{
		function __construct($tong)
		
		{			
			$this->tong = $tong;
			
			
			}
		}
		
		





?>