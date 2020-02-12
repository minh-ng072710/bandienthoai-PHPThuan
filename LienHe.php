<div class="container" id="contact">

                <section>
                    <div class="row">
                        <div class="col-md-8">

                            <div class="heading">
                                <h2>Chúng tôi ở đây để phục vụ bạn</h2>
                            </div>

                            <p class="lead">Bạn có điều gì chưa rõ không? Bạn có cần tư vấn về cách sử dụng điện thoại không? Bạn có cần tìm hiểu một vài tính năng mới không? Bạn có đang cần mua một điện thoại mới? Mọi vấn đề về điện thoại mà bạn muốn biết… xin hãy đến với chúng tôi.</p>
                            <p>Vui lòng điền thông tin trong mẫu dưới để liên hệ với chúng tôi (24/24)</p>

                            <div class="heading">
                                <h3>Form Liên Hệ</h3>
                            </div>
								<?php 
					if (isset($_POST['name']) ==true){
					$t=htmlentities(trim(strip_tags($_POST['name'])),ENT_QUOTES,'utf-8');
					$h=htmlentities(trim(strip_tags($_POST['ho'])),ENT_QUOTES,'utf-8');
					$m=htmlentities(trim(strip_tags($_POST['email'])),ENT_QUOTES,'utf-8');
					$td=htmlentities(trim(strip_tags($_POST['tieude'])),ENT_QUOTES,'utf-8');
					$nd=htmlentities(trim(strip_tags($_POST['message'])),ENT_QUOTES,'utf-8');
					$nd= nl2br($nd);
					$loi="";
					$cap = $_POST['cap'];
					if ($cap!= $_SESSION['captcha_code']) $loi.="Bạn nhập chữ không đúng với hình<br>";

					if ($t=="") $loi.="Bạn chưa nhập tên<br>";
					if ($h=="") $loi.="Bạn chưa nhập họ <br>";
					if ($m=="") $loi.="Bạn chưa nhập email<br>";
					if ($td=="") $loi.="Bạn chưa nhập tiêu đề<br>";
					if ($nd=="") $loi.="Bạn chưa nhập nội dung liên hệ<br>";
					else if (strlen($nd)<=10) $loi.="Nội dung liên hệ quá ngắn<br>";
					if ($loi==""){
					   $to ="minh.ng2419@sinhvien.hoasen.edu.vn"; 
					   $from="minh072710@gmail.com";
					   $pass="nguyengiaminh";
					   $topText="Họ tên: {$ht}<br>Email: {$m}<br>Tiêu đề: {$td}" ;
					   $nd = $topText."<br>Nội dung:<hr>".$nd;		
					   $error="";
					   $dt->GuiMail($to, $from,$fromName="Minh",$td,$nd,$from,$pass,$error);
					   if ($error!="") $loi=$error;
					   else {
						   $_SESSION['camon'] ="Cảm ơn bạn. Ý kiến đã được ghi nhận";
						   echo "<script>document.location='/banhang/lien-he/';</script>";
						   exit();
					   }
					}
					}
					?>
					<div id="thongbaoLH" style="background:#ccc;color:red; padding:20px; text-align:center;line-height:150%; margin-top:10px">
					<?php 
						if ($loi!="") echo $loi;
						if (isset($_SESSION['camon'])==true) {
							echo $_SESSION['camon'] ; unset($_SESSION['camon']); }
						?>
					</div>
					<?php if (isset($_SESSION['camon'])==false) {?>

                            <form method="post" >
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="firstname">Tên</label>
                                            <input type="text" class="form-control" id="firstname" name='name' value="<?php if (isset($_POST['name']) ) echo $_POST['name']?>" placeholder="Nhập Tên">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="lastname">Họ</label>
                                            <input type="text" class="form-control" id="lastname" name='ho' value="<?php if (isset($_POST['ho']) ) echo $_POST['ho']?>" placeholder="Nhập Tên">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name='email' value="<?php if (isset($_POST['email'])) echo $_POST['email']?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="subject">Tiêu Đề</label>
                                            <input type="text" class="form-control" id="subject" name='tieude' value="<?php if (isset($_POST['tieude']) ) echo $_POST['tieude']?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="message">Nội Dung</label>
                                            <textarea id="message" name="message" class="form-control" ><?php if (isset($_POST['message']) ) echo $_POST['message']?></textarea>
                                        </div>
                                    </div>
									&nbsp;
								<fieldset>
								<div class="block">
								 <img src="captcha.php" align="left" height="46"> &nbsp; 
								 <input class="text_input" name="cap" placeholder="Nhập chữ trong hình" value="<?php if (isset($_POST['cap']) ) echo $_POST['cap']?>" >
								</div>
								</fieldset>

                                    <div class="col-sm-12 text-center">
                                        <button type="submit" class="btn btn-template-main"><i class="fa fa-envelope-o"></i> Gửi Thông Tin</button>

                                    </div>
                                </div>
                                <!-- /.row -->
                            </form>
							<?php } ?>
                        </div>

                        <div class="col-md-4">


                            <h3 class="text-uppercase">Li</h3>

                            <p>13/25 New Avenue
                                <br>New Heaven
                                <br>45Y 73J
                                <br>England
                                <br>
                                <strong>Great Britain</strong>
                            </p>

                            <h3 class="text-uppercase">Call center</h3>

                            <p class="text-muted">This number is toll free if calling from Great Britain otherwise we advise you to use the electronic form of communication.</p>
                            <p><strong>+33 555 444 333</strong>
                            </p>



                            <h3 class="text-uppercase">Electronic support</h3>

                            <p class="text-muted">Please feel free to write an email to us or to use our electronic ticketing system.</p>
                            <ul>
                                <li><strong><a href="mailto:">info@fakeemail.com</a></strong>
                                </li>
                                <li><strong><a href="#">Ticketio</a></strong> - our ticketing support platform</li>
                            </ul>


                        </div>

                    </div>


                </section>

            </div>