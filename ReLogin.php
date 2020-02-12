<?php
session_start();
require_once('class/dt.php'); $dt= new dt; 
$dt->checklogin();
$loi = array(); $loi_str="";
if (isset($_POST['pass'])){	
   $passold = $_POST['passold'];
   $pass = $_POST['pass'];
   $repass = $_POST['repass'];
   $thanhcong = $dt->DoiMatKhau($passold, $pass, $repass, $loi);
   if ($thanhcong==true) {	
    echo "<script>document.location='reloginsc.php';</script>"; 
    exit();
   }else foreach($loi as $s) $loi_str = $loi_str . $s . "<br/>";
}

?>

<link rel="stylesheet" href= "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<title>Trang đăng nhập</title><meta charset="utf-8">
<div class="container" style="margin-top:20px" >
<div class="col-md-6 col-md-offset-3" >
<div class="panel panel-default" >
<div class="panel-heading">ĐỔI MẬT KHẨU</div>
<div class="panel-body">	
	<?php if ($loi_str!="") {?>
     <div class="alert alert-danger"> <?=$loi_str?></div>
<?php }?>

<form class="form-horizontal" method="POST" action="" >
<div class="form-group">
     <label class="control-label col-sm-3">Email:</label>
     <div class="col-sm-9">
     <input class="form-control" disabled  value="<?=$_SESSION['login_email']?>">	 
     </div>
</div>
<div class="form-group">
     <label class="control-label col-sm-3">Họ tên:</label>
     <div class="col-sm-9">
     <input class="form-control" disabled  value="<?=$_SESSION['login_hoten']?>">	 
     </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-3" for="passold">Mật khẩu cũ</label>
    <div class="col-sm-9"> 
     <input type="password" class="form-control" id="passold" name="passold"  required placeholder="Mật khẩu cũ" value="<?php if (isset($_POST['passold'])) echo $_POST['passold']; ?>" >
    </div>
</div>
<div class="form-group">
     <label class="control-label col-sm-3" for="pass">Mật khẩu mới:</label>
     <div class="col-sm-9"> 
     <input type="password" class="form-control" id="pass" name="pass"  required placeholder="Mật khẩu mới" value="<?php if (isset($_POST['pass'])) echo $_POST['pass']; ?>" >
     </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-3" for="repass">Gõ lại mk mới:</label>
    <div class="col-sm-9"> 
   <input type="password" class="form-control" id="repass" name="repass" required placeholder="Mật khẩu" value="<?php if (isset($_POST['repass'])) echo $_POST['repass']; ?>" >
    </div>
</div>  
<div class="form-group">
     <label class="control-label col-sm-3" ></label>
     <div class="col-sm-9">
      <button type="submit" class="btn btn-default">Đổi mật khẩu</button>
     </div>
</div> 
</form>   
</div>  
</div></div></div>
