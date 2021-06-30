<?php
session_start();
$user = $_GET['username'];
$pass = $_GET['password'];
require'connect.php';
	$query = "SELECT user, password,role FROM account WHERE  user = '$user' and password = '$pass' ";
	$data = mysqli_query($connect, $query);
	$arraydata = array();

	if((mysqli_num_rows($data) == 1)) {
		while ($row = mysqli_fetch_assoc($data)) {
		array_push($arraydata, new Lists($row['user'], $row['password'],$row['role']));
	}	
		$_SESSION['role'] = $arraydata[0]->role;	
	 	if($_SESSION['role'] == "1"){
			header("Location: ../index.php");
		}
	}
	else{
		echo '<script>
		alert("Vui lòng nhập chính xác tài khoản");
		window.location.href="https://apptm.000webhostapp.com/khoa_luan/Sou/site/login.php";
		</script>';		  
		die();
	}

	while ($row = mysqli_fetch_assoc($data)) {
		array_push($arraydata, new Lists($row['user'], $row['password'],$row['role']));
	}
	$_SESSION['role'] = $arraydata[0]->role;
	if(isset($_SESSION['role'])){
				header("Location: ../index.php");
		}		
	else{		
	}
	function head(){
		header("Location: ../login.php");
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

