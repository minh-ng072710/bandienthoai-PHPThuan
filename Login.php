<?php
session_start();
$loi=array();
if (isset($_POST['mail'])){	
	require_once('class/dt.php');  
	$dt= new dt; 	 
	$thanhcong = $dt->login($_POST['mail'], $_POST['pass'], $loi);	
	if ($thanhcong==true) {	
	   if (isset($_SESSION['back'])){
		$back= $_SESSION['back'];
		unset($_SESSION['back']);
		header("location:".$back);
		}else header("location: index.php");
		exit();
	}
		 else foreach($loi as $s) $loi_str = $loi_str . $s . "<br/>"; 
	}	

?>


<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<title>Trang đăng nhập</title><meta charset="utf-8">
<?php if(isset($loi['active'])) { ?>
	<div class="alert alert-danger text-center"> <?=$loi_str?></div> 
	<?php }?>
<div class="container" style="margin-top:20px; width:450px" >
<div class="panel panel-default" >
<div class="panel-heading"><b>THÀNH VIÊN ĐĂNG NHẬP</b></div>
<div class="panel-body">
<form class="form-horizontal" method="POST" action="" >
<div class="form-group">
<label class="control-label col-sm-3">Email:</label>
<div class="col-sm-9">
<input type="email" class="form-control" name="mail" required placeholder= "Email của bạn" value="<?php if (isset($_POST['mail'])) echo $_POST['mail']; ?>" > 

	<?php if (isset($loi['mail'])) echo $loi['mail']?>
</div>
</div> 
 
<div class="form-group">
<label class="control-label col-sm-3">Mật khẩu:</label>
<div class="col-sm-9"> 
<input type="password" class="form-control" name="pass" required placeholder= "Mật khẩu" value="<?php if (isset($_POST['pass'])) echo $_POST['pass']; ?>" >
	<?php if (isset($loi['pass'])) echo $loi['pass']?>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" ></label>
<div class="col-sm-9">
<button type="submit" class="btn btn-default">Đăng nhập</button>
</div>
</div> 
</form>
</div>
</div></div>
