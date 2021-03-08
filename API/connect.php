<?php
    // $ketnoi['host'] = 'localhost'; //Tên server, nếu dùng hosting free thì cần thay đổi
    // $ketnoi['dbname'] = 'nhakhoa'; //Đây là tên của Database
    // $ketnoi['username'] = 'root'; //Tên sử dụng Database
    // $ketnoi['password'] = '';//Mật khẩu của tên sử dụng Database
    
    $connect = mysqli_connect("localhost", "root", "", "nhkhoaver2");
	mysqli_query($connect, "SET NAMES 'utf8'");

	
?>