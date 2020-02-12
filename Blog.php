<style>
.box-image-text.blog .intro {height: 115px ; overflow:hidden; line-height:180%; font-size:16px; text-align:justify;  }
.box-image-text .content h4 {height:48px ; overflow:hidden; font-size:17px;}
.box-image-text .image img {height:160px; width:100%}
</style>
<section class="bar background-white no-mb">
            <div class="container">

                <div class="col-md-12">
                    <div class="heading text-center">
                        <h2>Thông Tin Từ Cửa Hàng</h2>
                    </div>

                    <p class="lead">Các tin tức công nghệ, hướng dẫn sử dụng, giới thiệu điện thoại, tin tức khuyến mãi từ hệ thống cửa hàng của chúng tôi sẽ được publish thường xuyên vào đây để thông tin và hỗ trợ quý vị <span class="accent">Check our blog!</span>
                    </p>

                    <!-- *** BLOG HOMEPAGE ***
_________________________________________________________ -->

                    <div class="row">
						<?php $bg = $DT->Blog(8);?>
						<?php while ($row = $bg ->fetch_assoc() ) { ?>

                        <div class="col-md-3 col-sm-6">
                            <div class="box-image-text blog">
                                <div class="top">
                                    <div class="image">
                                        <img src="<?=$row['urlHinh']?> " alt="" class="img-responsive" onerror="this.src='<?=BASE_URL?>defaultImg.jpg'">
                                    </div>
                                    <div class="bg"></div>
                                    <div class="text">
                                        <p class="buttons">
                                            <a href="blog-post.html" class="btn btn-template-transparent-primary"><i class="fa fa-link"></i> Xem tiếp</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="content">
                                    <h4><a href="blog-post.html"><?=$row['TieuDe']?></a></h4>
                                    
                                    <p class="intro"><?=$row['TomTat']?></p>
                                    <p class="read-more"><a href="blog-post.html" class="btn btn-template-main">Xem tiếp</a>
                                    </p>
                                </div>
                            </div>
                            <!-- /.box-image-text -->

                        </div>
<?php } ?>
                        

                        

                        

                    </div>
                    <!-- /.row -->

                    <!-- *** BLOG HOMEPAGE END *** -->

                </div>

            </div>
            <!-- /.container -->
        </section>