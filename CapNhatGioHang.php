<?php 
session_start();
require_once("Class/DT.php");
$dt= new DT;
$action=$_GET['action']; 
$idDT=$_GET['idDT']; 
$dt->CapNhatGioHang($action,$idDT);
print_r($_SESSION['daySoLuong']); echo "<br>";
print_r($_SESSION['dayTenDT']); echo "<br>";
print_r($_SESSION['dayDonGia']); echo "<br>";
?>