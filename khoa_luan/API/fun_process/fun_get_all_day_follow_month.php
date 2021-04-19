<?php
// $list=array();
// $month = 12;
// $year = 2014;

// for($d=1; $d<=31; $d++)
// {
//     $time=mktime(12, 0, 0, $month, $d, $year);          
//     if (date('m', $time)==$month)       
//         $list[]=date('Y-m-d-D', $time);
// }
// echo "<pre>";
// print_r($list);
// echo "</pre>";



$list=array();
$month = $_GET['month'];
$year = $_GET['year'];
//$day = $_GET['day'];


for($d=1; $d<=31; $d++)
{
    $time=mktime(12, 0, 0, $month, $d, $year);          
    if (date('m', $time)==$month and date('D',$time) == $day)       
        //$list[]=date('Y-m-d-D', $time);  
        array_push($list, new Lists(date('Y-m-d-', $time),date('D',$time)));
}
echo json_encode($list,256);
class ngay
{
		function __construct($ngay,$thu)

		{			
			$this->ngay = $ngay;
			$this->thu = $thu;
						
		}
}

class db
{
	function __construct($thu)

		{			
			
			$this->thu = $thu;
						
		}

}




?>