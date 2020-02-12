<?php
if (isset($_SESSION['DonHang'])==false){ 
   header("location:/banhang/"); exit(); // trong trường hợp khách đã đặt mua nhưng chưa bấm nút submit và thường thì biến sesion chỉ lưu trong khoảng nửa tiếng đồng hồ
}
$error = array();
$dt->LuuDonHang($error); //lưu thông tin đơn hàng 
if (count($error)==0){
	$dt->LuuChiTietDonHang(); //lưu các sản phẩm user đã mua
	unset($_SESSION['dayTenDT']);//hủy th.tin đã lưu  trong session, hủy đi để cho người ta mua tiếp và qua một đơn hàng khác
	unset($_SESSION['dayDonGia']);
	unset($_SESSION['daySoLuong']);
	unset($_SESSION['DonHang']);
}
?>
<div class="container"> <div class="row">
<div class="col-md-12 clearfix">
<?php if (count($error)>0){ ?> //nếu có lỗi
    <div class="heading"> <h2>Có lỗi xảy ra</h2> </div>	
    <p class="lead" > 
    Có lỗi xảy ra trong quá trình lưu đơn hàng của bạn.<br/><br/>
    <?php foreach($error as $e) echo $e,"<br>"; ?>
    <br/><br/> <a href="gio-hang/">Về trang giỏ hàng</a>
    </p>
<?php } else {?> //nếu không có lỗi gì hết thì hiện lời cảm ơn 
    <div class="heading"> <h2>Cảm ơn quý khách</h2> </div>	
    <p class="lead">
	Đơn hàng đã được ghi nhận! Chúng tôi sẽ giao hàng trong thời 
     gian sớm nhất. <br/> Mọi thắc mắc trong quá trình sử dụng, 
     mời liên hệ ngay với chúng tôi trong. <br/>
     Kính chúc quý khách mạnh khỏe, an lành.<br/><br/>
	<a href="<?=BASE_URL?>">Về trang chủ</a>
	</p>
<?php }?>
<p>&nbsp;</p> <p>&nbsp;</p>
</div> </div> </div>
