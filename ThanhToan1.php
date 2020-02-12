<div class="container">

                <div class="row">

                    <div class="col-md-9 clearfix" id="checkout">

                        <div class="box">
                            <form method="post" action="shop-checkout2.html">

                                <ul class="nav nav-pills nav-justified">
                                    <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Địa chỉ</a>
                                    </li>
                                    <li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>Phương thức giao hàng</a>
                                    </li>
                                    <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Phương thức thanh toán</a>
                                    </li>
                                    <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Thông tin đơn hàng</a>
                                    </li>
                                </ul>

                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="firstname">Họ Tên</label>
                                                <input type="text" class="form-control" id="hoten" name="hoten" required oninvalid="this.setCustomValidity('Mời bạn nhập họ tên');"oninput="this.setCustomValidity('');">
												
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="lastname">Địa chỉ</label>
                                                <input type="text" class="form-control" id="diachi" name="diachi" required oninvalid="this.setCustomValidity('Bạn cho biết địa chỉ nhé');" oninput="this.setCustomValidity('');" > 
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="company">Điện Thoại</label>
                                              <input type="text" class="form-control" id="dienthoai" name="dienthoai" required oninvalid="this.setCustomValidity('Bạn ơi số điện thoại của bạn chưa có.');" oninput="this.setCustomValidity('');"  > 
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="street">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" required oninvalid="this.setCustomValidity('Bạn thân mến! Còn email nữa');" oninput="this.setCustomValidity('');" >
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->

                                    
                                    <!-- /.row -->
                                </div>

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="<?=BASE_URL?>/gio-hang/" class="btn btn-default"><i class="fa fa-chevron-left"></i>Xem lại giỏ hàng </a>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-template-main">Qua bước kế<i class="fa fa-chevron-right"></i>
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