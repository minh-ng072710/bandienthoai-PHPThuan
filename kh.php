<?php require_once "class/dt.php"; 
$dt = new dt;
$sorecord = $dt->DanhDauKichHoatUser($_GET['id'], $_GET['rd']);
?>
<!doctype html><html><head>
<meta charset="utf-8">
<title>Kích hoạt tài khoản</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head><body>
<div class="panel panel-default text-center text-uppercase" style="width:60%; margin:50px auto">
  <div class="panel-heading"><b>Kích hoạt tài khoản</b></div>
  <div class="panel-body">
     <?php if ($sorecord>0) { ?>
       <div class="alert alert-success">
         Đã kích hoạt xong tài khoản.<br/>
         Mời bạn <a href=login.php> nhắp vào đây</a> để đăng nhập
       </div>
     <?php } else { ?>
       <div class="alert alert-info">
         Bạn đã kích hoạt tài khoản rồi<br/>Không cần kích hoạt nữa<br/><br/>
         <a href="index.php">Về trang chủ</a>
         </div>
     <?php } ?>
   </div>
</div>
</body></html>
