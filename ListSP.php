<style>
.product  {height:400px}
.product .image .img-responsive {margin:auto;margin-top:20px;height:180px}
.product .text h3 {height:32px; overflow:hidden; margin:15px;}
.product .buttons {display:block; padding:0; position:static}

</style>
<div class="row products">
<?php while ($row = $listSP->fetch_assoc() ) {?>
<div class="col-md-2 col-sm-3"> 
    <div class="product">
        <div class="image">
         <a href="shop-detail.html">
          <img src="<?=BASE_URL."upload/hinhchinh/".$row['urlHinh']?>" alt="" class="img-responsive image1">
         </a>
        </div>
        <!-- /.image -->
        <div class="text">
       <h3><a href="shop-detail.html"><?=$row['TenDT']?></a></h3>
       <p class="price"><?=number_format($row['Gia'],0, ",",".");?> VND</p>
       <p class="buttons">
       <a href="shop-detail.html" class="btn btn-default">Chi tiết</a>
       <a href="shop-basket.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
       </p>
      </div>
    <!-- /.text -->
    </div>
 <!-- /.product -->
</div>                    
<?php } ?>
</div>
