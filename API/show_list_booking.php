<?php
include('./connect.php');



$connect = mysqli_connect("localhost","root","","dentalapp");

$query = "SELECT stt,sdt,name,gioitinh,tenvande,time_cre,time_yeucau FROM list_booking inner join vande on list_booking.id_vande = vande.id_vande where id_trangthai='1'";
$data = mysqli_query($connect,$query);
$arraydata = array();
	while ($row = mysqli_fetch_assoc($data)) {
		# code...
		array_push($arraydata, new Lists($row['stt'],$row['sdt'],$row['name'],$row['gioitinh'],$row['tenvande'],$row['time_cre'],$row['time_yeucau']));
	}
	echo json_encode($arraydata,256);

class Lists
{
	function __construct($stt,$sdt,$name,$gioitinh,$tenvande,$time_cre,$time_yeucau)
	{			
		$this->stt = $stt;
		$this->sdt = $sdt;
		$this->name = $name;		
		$this->gioitinh = $gioitinh;		
		$this->tenvande = $tenvande;	
		$this->time_cre = $time_cre;	
		$this->time_yeucau = $time_yeucau;		
						
			
	}
}


?>