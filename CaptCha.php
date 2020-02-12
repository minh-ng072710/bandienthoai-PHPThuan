<?php //file capcha.php
session_start(); 
header('Content-type: image/png');
header("Pragma: No-cache");
header("Cache-Control:No-cache, Must-revalidate"); 
$sokytu=6;  $w = 180;  $h = 55; $nghieng=5;
$size=27; $x=20; $y=45;  //toạ độ chữ
$font = 'C:\xampp\htdocs\news\ARIALN.TTF';
$str= md5(rand(0,9999));  //chữ ngẫu nhiên 
$str = strtoupper(substr($str, 10, $sokytu)); 
$_SESSION['captcha_code'] = $str; 

$img = imagecreatetruecolor($w, $h); //tạo hình
$nen = imagecolorallocate($img, 0, 153, 255); //tạo màu cần dùng
$maubong = imagecolorallocate($img, 204, 204, 102);
$mauchu= imagecolorallocate($img, 255, 255, 255);
$vien = ImageColorAllocate($img, 127, 127, 127);

imagefilledrectangle($img, 0, 0, $w-1, $h-1, $nen);
for ($i=0; $i<=$h; $i+=10)ImageLine($img, 0, $i, $w, $i, $vien); 
for ($i=0; $i<=$w; $i+=10) ImageLine($img, $i, 0, $i, $h, $vien);

imagettftext($img, $size,$nghieng, $x+3, $y+3, $maubong,$font,$str);
imagettftext($img, $size, $nghieng, $x, $y, $mauchu, $font, $str);
imagepng($img);
?>
