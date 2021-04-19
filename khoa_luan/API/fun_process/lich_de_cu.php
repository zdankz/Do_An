<?php
	$connect = mysqli_connect("localhost", "root", "", "luan_an");
	mysqli_query($connect, "SET NAMES 'utf8'");

	$id_dv = $_GET['dichvu'];
	$id_nha_si = $_GET['id_nha_si'];
	$ngay = $_GET['ngay'];
	//============== moc thoi gian k lam viec dc nua =================//
	
	$time_dexuat = new datetime('18:00:00');
	$time_dexuat_off = $time_dexuat -> getTimestamp();



	//GET THEO DICH VU
	$connect = mysqli_connect("localhost","root","","luan_an");	
	$query = "SELECT id_dich_vu,ten_dich_vu,chiphi_dich_vu,thoi_gian_uoc_tinh from dich_vu where id_dich_vu = '$id_dv'";
	$data = mysqli_query($connect,$query);
	$arraydata = array();
			while ($row = mysqli_fetch_assoc($data)) {
			# code...
			array_push($arraydata, new dichvuget($row['id_dich_vu'],$row['ten_dich_vu'],$row['chiphi_dich_vu'],$row['thoi_gian_uoc_tinh']));			
		}
	
	$id_dich_vu = $arraydata[0]->id_dich_vu;	
	$ten_dich_vu = $arraydata[0]->ten_dich_vu;	
	$chiphi_dich_vu = $arraydata[0]->chiphi_dich_vu;	
	$thoi_gian_uoc_tinh = $arraydata[0]->thoi_gian_uoc_tinh;

	
// ==============Xuất lịch BS và add DV vào ===========================
	$connect = mysqli_connect("localhost","root","","luan_an");	
	$query_ns = "CALL show_time_next('$id_nha_si',$ngay)";
	$data2 = mysqli_query($connect,$query_ns);
	// $arraydata2 = array();
	// 		while ($row = mysqli_fetch_assoc($data2)) {
	// 		# code...
	// 		array_push($arraydata2, new nhasiget($row['id_nha_si'],$row['ho_ten_nha_si'],$row['ngay'],$row['batdau']));			
	// 	}
	
	// $id_nha_si_get = $arraydata2[0]->id_nha_si;	//echo $id_nha_si_get;
	// $ho_ten_nha_si = $arraydata2[0]->ho_ten_nha_si;	//echo ho_ten_nha_si;
	// $ngay = $arraydata2[0]->ngay;	//echo $ngay;
	// $batdau = $arraydata2[0]->batdau;




	if((mysqli_num_rows($data2) == 0)) 
	{
			$connect = mysqli_connect("localhost","root","","luan_an");
			$batdau = "08:00:00";
			$ngay = str_replace("'"," ",$ngay);
			$query_getNS = "SELECT Id_nha_si,ho_ten_nha_si FROM nha_si WHERE Id_nha_si ='$id_nha_si'";
			$kt = mysqli_query($connect,$query_getNS);
			$arrayNS = array();
			//array_push($arrayNS, new NS($row['id_nha_si'],$row['ho_ten_nha_si'],$ngay,$batdau));
			
			while ($row =  mysqli_fetch_assoc($kt)) {
				# code...
				array_push($arrayNS, new NS($row['Id_nha_si'],$row['ho_ten_nha_si'],$ngay,$batdau));	

			}
			
			$idNS = $arrayNS[0]->id_nha_si;
			$hotenNS = $arrayNS[0]->ho_ten_nha_si;
			$arraydata3 = array();
			array_push($arraydata3,new Lists($idNS,$hotenNS,$id_dich_vu,$ten_dich_vu,$chiphi_dich_vu,$ngay,$batdau,addtime($batdau,$thoi_gian_uoc_tinh)));

			echo json_encode($arraydata3,256);



	} 

	else
	{		
			
			$arraydata2 = array();
				while ($row = mysqli_fetch_assoc($data2)) {
				# code...
				array_push($arraydata2, new nhasiget($row['id_nha_si'],$row['ho_ten_nha_si'],$row['ngay'],$row['batdau']));			
			}
		
			$id_nha_si_get = $arraydata2[0]->id_nha_si;	//echo $id_nha_si_get;
			$ho_ten_nha_si = $arraydata2[0]->ho_ten_nha_si;	//echo ho_ten_nha_si;
			$ngay = $arraydata2[0]->ngay;	//echo $ngay;
			$batdau = $arraydata2[0]->batdau;

			$check_time = addtime($batdau,$thoi_gian_uoc_tinh);
			$check_time_ol = new Datetime($check_time);
			$check_time_ol = $check_time_ol-> getTimestamp();





			//=================KHOI TAO DOI TUNG TRA VE=============//

			
			if($check_time_ol <= $time_dexuat_off)
			{

				$arraydata3 = array();
				array_push($arraydata3,new Lists($id_nha_si_get,$ho_ten_nha_si,$id_dich_vu,$ten_dich_vu,$chiphi_dich_vu,$ngay,$batdau,addtime($batdau,$thoi_gian_uoc_tinh)));	

				echo json_encode($arraydata3,256);

			}
			else {
				$arraydata3 = array();
				array_push($arraydata3,new Lists($id_nha_si_get,$ho_ten_nha_si,$id_dich_vu,$ten_dich_vu,$chiphi_dich_vu,$ngay,$batdau,"FULL"));	
				echo json_encode($arraydata3,256);
			}
			
	}

	

//===========================================================================



	class Lists
	{
		function __construct($id_nha_si,$ho_ten_nha_si,$id_dich_vu,$ten_dich_vu,$chiphi_dich_vu,$ngay,$batdau,$ketthuc)

		{			
			$this->id_nha_si = $id_nha_si;
			$this->ho_ten_nha_si = $ho_ten_nha_si;
			$this->id_dich_vu = $id_dich_vu;		
			$this->ten_dich_vu = $ten_dich_vu;
			$this->chiphi_dich_vu = $chiphi_dich_vu;			
			$this->ngay = $ngay;
			$this->batdau = $batdau;
			$this->ketthuc = $ketthuc;				
		}
	}
	class dichvuget
	{
		function __construct($id_dich_vu,$ten_dich_vu,$chiphi_dich_vu,$thoi_gian_uoc_tinh)

		{					
			$this->id_dich_vu = $id_dich_vu;		
			$this->ten_dich_vu = $ten_dich_vu;
			$this->chiphi_dich_vu = $chiphi_dich_vu;
			$this->thoi_gian_uoc_tinh = $thoi_gian_uoc_tinh;
						
		}

	}
	class nhasiget
	{
		function __construct($id_nha_si,$ho_ten_nha_si,$ngay,$batdau)

		{			
			$this->id_nha_si = $id_nha_si;
			$this->ho_ten_nha_si = $ho_ten_nha_si;						
			$this->ngay = $ngay;
			$this->batdau = $batdau;						
		}
	}

	class NS
	{
		function __construct($id_nha_si,$ho_ten_nha_si,$ngay,$batdau)

		{			
			$this->id_nha_si = $id_nha_si;
			$this->ho_ten_nha_si = $ho_ten_nha_si;
			$this->ngay  =$ngay;
			$this->batdau = $batdau;						
								
		}

	}

	function addtime($str_time_bd,$str_time){
		$str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $str_time);
		sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);
		$time_seconds = $hours * 3600 + $minutes * 60 + $seconds;
		$batdau = new Datetime($str_time_bd);
		$time_bd = $batdau-> getTimestamp();
		
		$add = $time_seconds + $time_bd;
		$thoi_uoc_tinh = date('H:i:s',$add);
		return $thoi_uoc_tinh;
		//echo $thoi_uoc_tinh;
	}
	//addtime($batdau,$thoi_gian_uoc_tinh);
?>