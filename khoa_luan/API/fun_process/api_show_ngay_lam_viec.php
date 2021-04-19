<?php

$list=array();
$month = $_GET['month']; 
$year = $_GET['year'];
$idnhasi = $_GET['id_nhasi'];
$id_dv = $_GET['dichvu'];
//$day = $_GET['day'];

$connect = mysqli_connect("localhost", "root", "", "luan_an");
mysqli_query($connect, "SET NAMES 'utf8'");
$query = "CALL get_day_nhasi($idnhasi)";
$data = mysqli_query($connect,$query);
$arraydata = array();
			while ($row = mysqli_fetch_assoc($data)) {
			# code...
			array_push($arraydata, new db($row['lich_lam_viec_nha_si'],$row['id_nha_si']));
}
$thu = $arraydata[0]->thu;
$id_ns = $arraydata[0]->id_nha_si;
$a = date('d');

for($d= 1; $d<=31; $d++)
{
    $time=mktime(12, 0, 0, $month, $d, $year);          
    // if (date('m', $time)==$month and date('D',$time) == $day) 
    if (date('m', $time)==$month  and  strpos($thu,date('D',$time)) !== false )       
        //$list[]=date('Y-m-d-D', $time);  
        array_push($list, new ngay(date('d', $time),date('m', $time),date('Y-m-d', $time),date('D',$time),$id_ns,$id_dv));
}
echo json_encode($list,256);
class ngay
{
		function __construct($day,$month,$ngay,$thu,$id_nha_si,$id_dich_vu)

		{	
			$this->day = $day;
			$this->month = $month;		
			$this->ngay = $ngay;
			$this->thu = $thu;
			$this->id_nha_si = $id_nha_si;
			$this->id_dich_vu = $id_dich_vu;
						
		}
}

class db
{
	function __construct($thu,$id_nha_si)
		{				
			$this->thu = $thu;	
			$this->id_nha_si = $id_nha_si;					
		}

}




?>