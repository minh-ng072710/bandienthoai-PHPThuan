<?php 
if(isset ($_POST['HoTen']))
	$_SESSION['DonHang']['hoten']=$_POST['hoten'];
if (isset($_POST['diachi'])) 
   $_SESSION['DonHang']['diachi']=$_POST['diachi'];
if (isset($_POST['dienthoai'])) 
   $_SESSION['DonHang']['dienthoai']=$_POST['dienthoai'];
if (isset($_POST['email'])) 
   $_SESSION['DonHang']['email']=$_POST['email'];
//print_r($_SESSION);

?>

 <div class="container">

                <div class="row">

                    <div class="col-md-9 clearfix" id="checkout">

                        <div class="box">
                            <form method="post" action="thanh-toan-3/">
                                <ul class="nav nav-pills nav-justified">
								<li class="disabled"><a href="#"><i class="fa fa-map-marker"></i><br>Địa chỉ</a></li>
								<li class="active"><a href="#"><i class="fa fa-truck"></i><br>Phương thức giao hàng</a></li>
								<li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Phương thức thanh toán</a></li>
								<li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Thông tin đơn hàng</a></li>
								</ul>


                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="box shipping-method">

                                                <h4>GIAO TẬN NHÀ</h4>

                                                <p>Nội thành TPHCM - miễn phí. Nơi khác – 10000</p>

                                                <div class="box-footer text-center">

                                                    <input type="radio" name="delivery" value="giaotannha">Giao Tận Nhà
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="box shipping-method">

                                                <h4>CHUYỂN PHÁT NHANH EMS</h4>

                                                <p>Phí giao hàng 15000 VNĐ. TPHCM -2 ngày. Nơi khác tối đa 3 ngày.</p>

                                                <div class="box-footer text-center">

                                                    <input type="radio" name="delivery" value="chuyenphatnhanh">Chuyển phát nhanh
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="box shipping-method">

                                                <h4>CHUYỂN PHÁT THƯỜNG QUA BƯU ĐIỆN</h4>

                                                <p>Phí 5000 VNĐ. Tối đa 7 ngày..</p>

                                                <div class="box-footer text-center">

                                                    <input type="radio" name="delivery" value="buudien">Giao Qua Bưu Điện
                                                </div>
                                            </div>
                                        </div>
										<div class="col-sm-6">
										 <div class="box shipping-method">
											 <h4>HỎA TỐC</h4>
											 <p>Phí 25000 VNĐ. Giao hàng trong 1 ngày.</p>
											 <div class="box-footer text-center">
											 <input type="radio" name="delivery" value="hoatoc"> Giao hỏa tốc
										 </div>
									</div>
									</div>

                                    </div>
                                    <!-- /.row -->

                                </div>
                                <!-- /.content -->

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="thanh-toan-1/" class="btn btn-default"><i class="fa fa-chevron-left"></i>Trở lại</a>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-template-main">Qua bước kế tiếp<i class="fa fa-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->


                    </div>
                    <!-- /.col-md-9 -->

                    <div class="col-md-3">

                        <div class="box" id="order-summary">
                            <div class="box-header">
                                <h3>Order summary</h3>
                            </div>
                            <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Order subtotal</td>
                                            <th>$446.00</th>
                                        </tr>
                                        <tr>
                                            <td>Shipping and handling</td>
                                            <th>$10.00</th>
                                        </tr>
                                        <tr>
                                            <td>Tax</td>
                                            <th>$0.00</th>
                                        </tr>
                                        <tr class="total">
                                            <td>Total</td>
                                            <th>$456.00</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>
            </div>