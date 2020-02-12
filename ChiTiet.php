<?php
$idDT = $_GET['idDT'];
$ct = $dt-> chiTietSP($idDT);
$rowCT = $ct->fetch_assoc(); 
?>
<style>
h1.lead {color: #38a7bb; font-weight:900; text-transform:uppercase; font-size:26px}
p.goToDescription { margin-top:30px; text-align:left;}
#mainImage {margin-top:50px}
#mainImage img {height:250px; }
#productMain #thumbs img {height:80px}
#productMain #thumbs div {text-align:center}
#productMain #thumbs a {border:none;}


</style>
     <div class="container">

                <div class="row">

                    <!-- *** LEFT COLUMN ***
		    _________________________________________________________ -->

                    <div class="col-md-9">

                        <p class="lead"><?=$rowCT['MoTa']?>
                        </p>
                        <p class="goToDescription"><a href="#details" class="scroll-to text-uppercase">Cuộn để xem chi tiết sản phẩm</a>
                        </p>

                        <div class="row" id="productMain">
                            <div class="col-sm-6">
                                <div id="mainImage">
                                    <img src="upload/hinhchinh/<?=$rowCT['urlHinh']?> " alt="" class="img-responsive">
                                </div>

                                
                                <!-- /.ribbon -->

                                
                                <!-- /.ribbon -->

                            </div>
                            <div class="col-sm-6">
                                <div class="box">

                                    <form>
                                        

                                        <p class="price"><?=number_format($rowCT['Gia'],0, ",",".");?> VND</p>

                                        <p class="text-center">
                                            <button type="submit" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button>
                                            <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Add to wishlist"><i class="fa fa-heart-o"></i>
                                            </button>
                                        </p>

                                    </form>
                                </div>

                                <div class="row" id="thumbs">
							   <?php $lispHinh = $dt->layHinhSP($idDT,4);?>
							   <?php if ($lispHinh->num_rows>0) {?>
							   <?php while($rowH = $lispHinh ->fetch_assoc()) {?>
								<div class="col-xs-3">
								<a href="upload/hinhphu/<?=$rowH['urlHinh']?>" class="thumb">
								<img src="upload/hinhphu/<?=$rowH['urlHinh']?>" class="img-responsive">
								 </a>
								 </div>
							<?php } }?>
							</div>

                            </div>

                        </div>


                        <div class="box" id="details">                            
						 <h4>Giới thiệu</h4>
						 <div id="gioithieu"><?=$rowCT['baiviet']?></div>                               
					</div>


                        <div class="box social" id="product-social">
                            <h4>Show it to your friends</h4>
                            <p>
                                <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                            </p>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="box text-uppercase">
                                    <h3>You may also like these products</h3>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="product">
                                    <div class="image">
                                        <a href="#">
                                            <img src="img/product2.jpg" alt="" class="img-responsive image1">
                                        </a>
                                    </div>
                                    <div class="text">
                                        <h3>Fur coat</h3>
                                        <p class="price">$143</p>

                                    </div>
                                </div>
                                <!-- /.product -->
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="product">
                                    <div class="image">
                                        <a href="#">
                                            <img src="img/product3.jpg" alt="" class="img-responsive image1">
                                        </a>
                                    </div>
                                    <div class="text">
                                        <h3>Fur coat</h3>
                                        <p class="price">$143</p>
                                    </div>
                                </div>
                                <!-- /.product -->
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="product">
                                    <div class="image">
                                        <a href="#">
                                            <img src="img/product1.jpg" alt="" class="img-responsive image1">
                                        </a>
                                    </div>
                                    <div class="text">
                                        <h3>Fur coat</h3>
                                        <p class="price">$143</p>
                                    </div>
                                </div>
                                <!-- /.product -->
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="box text-uppercase">
                                    <h3>Products viewed recently</h3>
                                </div>
                            </div>


                            <div class="col-md-3 col-sm-6">
                                <div class="product">
                                    <div class="image">
                                        <a href="#">
                                            <img src="img/product3.jpg" alt="" class="img-responsive image1">
                                        </a>
                                    </div>
                                    <div class="text">
                                        <h3>Fur coat</h3>
                                        <p class="price">$143</p>
                                    </div>
                                </div>
                                <!-- /.product -->
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="product">
                                    <div class="image">
                                        <a href="#">
                                            <img src="img/product1.jpg" alt="" class="img-responsive image1">
                                        </a>
                                    </div>
                                    <div class="text">
                                        <h3>Fur coat</h3>
                                        <p class="price">$143</p>
                                    </div>
                                </div>
                                <!-- /.product -->
                            </div>


                            <div class="col-md-3 col-sm-6">
                                <div class="product">
                                    <div class="image">
                                        <a href="#">
                                            <img src="img/product2.jpg" alt="" class="img-responsive image1">
                                        </a>
                                    </div>
                                    <div class="text">
                                        <h3>Fur coat</h3>
                                        <p class="price">$143</p>

                                    </div>
                                </div>
                                <!-- /.product -->
                            </div>

                        </div>

                    </div>
                    <!-- /.col-md-9 -->


                    <!-- *** LEFT COLUMN END *** -->

                    <!-- *** RIGHT COLUMN ***
		  _________________________________________________________ -->

                    <div class="col-sm-3">

                        <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                        <div class="panel panel-default sidebar-menu">

                            <div class="panel-heading">
                                <h3 class="panel-title">Categories</h3>
                            </div>

                            <div class="panel-body">
                                <ul class="nav nav-pills nav-stacked category-menu">
                                    <li>
                                        <a href="shop-category.html">Men <span class="badge pull-right">42</span></a>
                                        <ul>
                                            <li><a href="shop-category.html">T-shirts</a>
                                            </li>
                                            <li><a href="shop-category.html">Shirts</a>
                                            </li>
                                            <li><a href="shop-category.html">Pants</a>
                                            </li>
                                            <li><a href="shop-category.html">Accessories</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="active">
                                        <a href="shop-category.html">Ladies  <span class="badge pull-right">123</span></a>
                                        <ul>
                                            <li><a href="shop-category.html">T-shirts</a>
                                            </li>
                                            <li><a href="shop-category.html">Skirts</a>
                                            </li>
                                            <li><a href="shop-category.html">Pants</a>
                                            </li>
                                            <li><a href="shop-category.html">Accessories</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="shop-category.html">Kids  <span class="badge pull-right">11</span></a>
                                        <ul>
                                            <li><a href="shop-category.html">T-shirts</a>
                                            </li>
                                            <li><a href="shop-category.html">Skirts</a>
                                            </li>
                                            <li><a href="shop-category.html">Pants</a>
                                            </li>
                                            <li><a href="shop-category.html">Accessories</a>
                                            </li>
                                        </ul>
                                    </li>

                                </ul>

                            </div>
                        </div>

                        <div class="panel panel-default sidebar-menu">

                            <div class="panel-heading">
                                <h3 class="panel-title">Brands</h3>
                                <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
                            </div>

                            <div class="panel-body">

                                <form>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">Armani (10)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">Versace (12)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">Carlo Bruni (15)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">Jack Honey (14)
                                            </label>
                                        </div>
                                    </div>

                                    <button class="btn btn-default btn-sm btn-template-main"><i class="fa fa-pencil"></i> Apply</button>

                                </form>

                            </div>
                        </div>

                        <div class="panel panel-default sidebar-menu">

                            <div class="panel-heading">
                                <h3 class="panel-title clearfix">Colours</h3>
                                <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
                            </div>

                            <div class="panel-body">

                                <form>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> <span class="colour white"></span> White (14)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> <span class="colour blue"></span> Blue (10)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> <span class="colour green"></span> Green (20)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> <span class="colour yellow"></span> Yellow (13)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> <span class="colour red"></span> Red (10)
                                            </label>
                                        </div>
                                    </div>

                                    <button class="btn btn-default btn-sm btn-template-main"><i class="fa fa-pencil"></i> Apply</button>

                                </form>

                            </div>
                        </div>

                        <!-- *** MENUS AND FILTERS END *** -->

                        <div class="banner">
                            <a href="shop-category.html">
                                <img src="img/banner.jpg" alt="sales 2014" class="img-responsive">
                            </a>
                        </div>
                        <!-- /.banner -->
                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** RIGHT COLUMN END *** -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
 