<?php
include('./connect.php');
$key_word = $_GET['key_word'];
//echo $key_word;

$connect = mysqli_connect("localhost","root","","Do_An");

$query = "SELECT mota FROM vande where ten_vande = '$key_word'";
$data = mysqli_query($connect,$query);
$arraydata = array();
	while ($row = mysqli_fetch_assoc($data)) {
		# code...
		array_push($arraydata, new Lists($row['mota']));
	}
	echo json_encode($arraydata,256);

class Lists
{
	function __construct($mota)
	{			
		//$this->ten_vande = $ten_vande;
		$this->mota = $mota;		
			
	}
}


?>