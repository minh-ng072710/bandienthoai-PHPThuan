<?php 
if(isset($_POST['delivery']))
	$_SESSION['DonHang']['delivery']=$_POST['delivery'];
//print_r($_SESSION);
?>


?>

<div class="container">

                <div class="row">

                    <div class="col-md-9 clearfix" id="checkout">

                        <div class="box">
                            <form method="post" action="thanh-toan-4/">
                                <ul class="nav nav-pills nav-justified">
								<li class="disabled"><a href="#"><i class="fa fa-map-marker"></i><br>Địa chỉ</a></li>
								<li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>Phương thức giao hàng</a></li>
								<li class="active"><a href="#"><i class="fa fa-money"></i><br>Phương thức thanh toán</a></li>
								<li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Thông tin đơn hàng</a></li>
								</ul>


                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="box payment-method">

                                                <h4>Chuyển khoản</h4>

                                                <p>Quý khách thanh toán bằng chuyển khoản</p>

                                                <div class="box-footer text-center">

                                                    <input type="radio" name="payment" value="chuyenkhoan"> Chuyển vào tài khoản 012 345 678 (Vietcombank)
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="box payment-method">

                                                <h4>THANH TOÁN KHI GIAO HÀNG</h4>

                                                <p>Quý khách trả tiền khi nhận hàng tại nhà.</p>

                                                <div class="box-footer text-center">

                                                    <input type="radio" name="payment" value="khigiaohang"> An toàn nhất.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="box payment-method">

                                                <h4>Cash on delivery</h4>

                                                <p>You pay when you get it.</p>

                                                <div class="box-footer text-center">

                                                    <input type="radio" name="payment" value="payment3">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->

                                </div>
                                <!-- /.content -->

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="shop-basket.html" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Shipping method</a>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-template-main">Continue to Order review<i class="fa fa-chevron-right"></i>
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