<?php
session_start();
$user = $_GET['username'];
// echo $user;
$pass = $_GET['password'];
// echo $pass;
// include('../API/connect.php');

	$connect = mysqli_connect("localhost", "root", "", "luan_an");
	

	$query = "SELECT user, password,role FROM account WHERE  user = '$user' and password = '$pass' ";
	$data = mysqli_query($connect, $query);
	$arraydata = array();

	if((mysqli_num_rows($data) == 1)) {
		while ($row = mysqli_fetch_assoc($data)) {
		# code...
		array_push($arraydata, new Lists($row['user'], $row['password'],$row['role']));
			}
	
		$_SESSION['role'] = $arraydata[0]->role;
	 	echo $_SESSION['role'];
		// header("Location: http://".$_SESSION['userType'].".php");

		if($_SESSION['role'] == "1"){
				header("Location: ../index.php");
				die();
		}
		// else if( $_SESSION['role'] == "2") 
		// {
		// header("Location: ../examples/sale.php");		
		// die();
		// }
		// elseif ($_SESSION['role'] == "3") {
		// 	# code...
		// 	header("Location: ../examples/letan.php");
		// 	die();
		// }
	}
	else{
		header("Location: ../login.php");
		//echo "0";
		die();
	}


	while ($row = mysqli_fetch_assoc($data)) {
		# code...
		array_push($arraydata, new Lists($row['user'], $row['password'],$row['role']));

	}
	//print_r($arraydata);

	// echo $arraydata[0]->user_type;
	$_SESSION['role'] = $arraydata[0]->role;
	 echo $_SESSION['role'];

	
	// if((mysqli_num_rows($data) == 1)) {
		//header("Location: http://".$_SESSION['userType'].".php");

		if($_SESSION['role'] == "1"){
				header("Location: ../index.php");
				die();
		}
		// else if( $_SESSION['role'] == "2") 
		// {
		// header("Location: ../examples/sale.php");		
		// die();
		// }
		// elseif ($_SESSION['role'] == "3") {
		// 	# code...
		// 	header("Location: ../examples/letan.php");
		// 	die();
		// }
	//}
	else{
		// header("Location: ../login.php");
		// //echo "0";
		// die();
	}

class Lists
{
	function __construct($username,$password,$role)
	{			
		$this->username = $username;
		$this->password = $password;
		$this->role  = $role;		
			
	}
}



?>

