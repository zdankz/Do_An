<?php 

	//$idns = $_GET['idns'];

	$connect = mysqli_connect("localhost", "root", "", "luan_an");
	mysqli_query($connect, "SET NAMES 'utf8'");

	$connect = mysqli_connect("localhost","root","","luan_an");
	
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