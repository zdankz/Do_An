<?php 
session_start(); 
 
if (isset($_SESSION['role'])){
    unset($_SESSION['role']); // xóa session login

    header("Location: ../login.php");
    die();
}
?>