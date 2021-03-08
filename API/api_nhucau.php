<?php
include('./connect.php');
$num =0;
$key_word = $_GET['key_word'];
if($key_word == "Thẩm Mỹ"){
	$num = 1;

	}else{
	$num =2;
}
$connect = mysqli_connect("localhost","root","","Do_An");

$query = "SELECT ten_vande, mota FROM vande where id_nhucau = '$num'";
$data = mysqli_query($connect,$query);
$arraydata = array();
	while ($row = mysqli_fetch_assoc($data)) {
		# code...
		array_push($arraydata, new Lists($row['ten_vande'],$row['mota']));
	}
	echo json_encode($arraydata,256);

class Lists
{
	function __construct($ten_vande,$mota)
	{			
		$this->ten_vande = $ten_vande;
		$this->mota = $mota;		
			
	}
}


?>