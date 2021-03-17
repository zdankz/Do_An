<?php
include('./connect.php');
$num =0;
$key_word = $_GET['key_word'];
if($key_word == "1"){
	$num = 1;

	}else{
	$num =2;
}
$connect = mysqli_connect("localhost","root","","dentalapp");

$query = "SELECT id_vande, tenvande,ing, mota FROM vande where id_nhom = '$num'";
$data = mysqli_query($connect,$query);
$arraydata = array();
	while ($row = mysqli_fetch_assoc($data)) {
		# code...
		array_push($arraydata, new Lists($row['id_vande'],$row['tenvande'],$row['mota'],$row['ing']));
	}
	echo json_encode($arraydata,256);

class Lists
{
	function __construct($id_vande,$tenvande,$mota,$ing)
	{			
		$this->id_vande = $id_vande;
		$this->tenvande = $tenvande;
		$this->mota = $mota;
		$this->ing = $ing;
				
			
	}
}


?>