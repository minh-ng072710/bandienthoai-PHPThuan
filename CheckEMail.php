<?php 
require_once('class/dt.php');  
$dt= new dt; 	 
$mail = $_GET['mail'];
if ($mail == NULL) echo "<span class='label label-warning'>Chưa nhập Mail bạn ơi</span>"; 
elseif (filter_var($mail,FILTER_VALIDATE_EMAIL)==FALSE)  echo "<span class='label label-warning'>Bạn nhập sai email rồi</span>";
elseif ($dt->CheckEmail($mail)==false) echo "<span class='label label-danger'>Email bạn nhập đã có người dùng</span>";
else echo "<span class='label label-success'>Bạn có thể đăng ký với email này</span>";
?>
