<?php

	include('./connect.php');

	$hoten = $_GET['hovaten'];
	echo $hoten ;
	echo "</br>";
	$gioitinh = $_GET['gioitinh'];
	echo $gioitinh ;
	echo "</br>";
	$sdt = $_GET['sdt'];
	echo $sdt ;
	echo "</br>";
	$tenvande = $_GET['tenvande'];
	echo $tenvande ;
	echo "</br>";
	$timeyc = $_GET['timeyc'];
	echo $timeyc ;
	echo "</br>";
	$trangthai = "1";
	echo $trangthai ;
	echo "</br>";
	$time = date("Y-m-d");
	echo $time;
	echo "</br>";


	$connect = mysqli_connect("localhost","root","","Do_An");	

	$query = "INSERT iNTO list_booking values ('','$sdt','$hoten','$gioitinh','$tenvande','$timeyc','$time','$trangthai')";
	$data = mysqli_query($connect,$query);

	echo "1";






?>