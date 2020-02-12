<?php
$loi = array(); 
$loi_str="";
if (isset($_POST['mail'])){	
			if ($_POST['cap']!=$_SESSION['captcha_code']){
		  $loi['captcha'] = "<span class='label label-danger'>Ban nhập sai ma so trong hinh</span>";
		}else {

      $thanhcong = $dt->DangKyThanhVien($loi);
      if ($thanhcong==true) {
        echo "<script>document.location='main.php?p=dangkytc';</script>";
        exit();
      }
      else foreach($loi as $s) $loi_str = $loi_str . $s . "<br/>"; // đây là hàm nối chuỗi để xuất lỗi, chỉ là chuỗi thì mới dùng nối chuỗi đc thế nên nếu để biến $loi trong này thì nó sẽ không dùng dấu. để nối chuỗi lại với nhau đ. Ban đầu khai báo nó là một array thì phải dùng foreach để lặp từng phần tử trong nó để xuất ra 
}
}
?>


<div class="col-md-8 text-center">
	<h4>GỬI MẬT KHẨU</h4>
<form action="customer-orders.html" method="post">
     <div class="form-group">
    <label for="email-login">Email</label>
      <input type="text" class="form-control" id="email-login" name="mail" value="<?php if (isset($_POST['mail'])) echo $_POST['mail']; ?>">
       </div>
         <div class="text-center">
               <button type="submit" class="btn btn-template-main"><i class="fa fa-user-md"></i>Gửi Pass</button>                  
            </div>
</form>                           
  </div>                                                         
                                                                                                           