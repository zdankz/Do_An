<?php
session_start();
$user = $_GET['username'];
$pass = $_GET['password'];
include('../API/connect.php');

	$connect = mysqli_connect("localhost", "root", "", "dentalapp");
	//$query = "SELECT * FROM users";

	$query = "SELECT user, pass, id_loaitk FROM taikhoan WHERE  user = '$user' and pass = '$pass' ";
	$data = mysqli_query($connect, $query);
	$arraydata = array();

	while ($row = mysqli_fetch_assoc($data)) {
		# code...
		array_push($arraydata, new Lists($row['user'], $row['pass'],$row['id_loaitk']));

	}
	//print_r($arraydata);

	// echo $arraydata[0]->user_type;
	$_SESSION['role'] = $arraydata[0]->id_type;
	 echo $_SESSION['role'];

	
	if((mysqli_num_rows($data) == 1)) {
		//header("Location: http://".$_SESSION['userType'].".php");

		if($_SESSION['role'] == "1"){
				header("Location: ../examples/tables.php");
				die();
		}
		else if( $_SESSION['role'] == "2") 
		{
		header("Location: ../examples/sale.php");		
		die();
		}
		elseif ($_SESSION['role'] == "3") {
			# code...
			header("Location: ../examples/letan.php");
			die();
		}
	}else{
		header("Location: ../V/index.html");
		//echo "0";
		die();
	}

class Lists
{
	function __construct($username,$password,$id_type)
	{			
		$this->username = $username;
		$this->password = $password;
		$this->id_type  = $id_type;		
			
	}
}



?>

