<?php require_once("Goc.php") ?>
<?php
class DT extends Goc{
	function Blog($sotin){
   $sql="SELECT idTin, TieuDe, TomTat,urlHinh FROM tin  WHERE AnHien = 1 
   ORDER BY RAND() LIMIT 0,$sotin";	
   $kq = $this->db->query($sql);	
   if(!$kq) die( $this-> db->error);
   return $kq;		
}
function SanPhamMoi($sosp = 10){				
   $sql="SELECT idDT, TenDT, urlHinh,Gia FROM dienthoai  WHERE AnHien = 1 
   ORDER BY NgayCapNhat DESC LIMIT 0,$sosp";	
   $kq = $this->db->query($sql);	
   if(!$kq) die( $this-> db->error);
   return $kq;		
}
function ListLoaiSP(){
   $sql="SELECT idLoai, TenLoai, hinh FROM loaisp  WHERE AnHien = 1
   ORDER BY ThuTu DESC LIMIT 0,12";	
   $kq = $this->db->query($sql);	
   if(!$kq) die( $this-> db->error);
   return $kq;		
}

	

function SanPhamBanChay($sosp = 10){				
   $sql="SELECT idDT, TenDT, urlHinh,Gia FROM dienthoai WHERE AnHien=1 
   ORDER BY SoLanMua DESC LIMIT 0,$sosp";	
   $kq = $this->db->query($sql);
   if(!$kq) die( $this-> db->error);
   return $kq;
}
	

function SanPhamHot($sosp = 10){
   $sql="SELECT idDT,TenDT,urlHinh,Gia FROM dienthoai 
   WHERE AnHien=1 AND Hot=1 ORDER BY NgayCapNhat DESC LIMIT 0,$sosp";
   $kq = $this->db->query($sql);
   if(!$kq) die( $this-> db->error);
   return $kq;
}
function CapNhatGioHang($action,$idDT){
	if(!isset($_SESSION['dayTenHinh'])) $_SESSION['urlHinh']=array();
	if(!isset($_SESSION['daySoLuong'])) $_SESSION['daySoLuong']=array();
	if(!isset($_SESSION['dayDonGia'])) $_SESSION['dayDonGia']=array();
	if(!isset($_SESSION['dayTenDT'])) $_SESSION['dayTenDT']=array();
	if($action=='add'){
		settype($idDT,"int");
		if($idDT<0) return;
		$sql="SELECT TenDT,Gia,SoLuongTonKho from dienthoai where idDT=$idDT";
		$kq=$this->db->query($sql);
		if(!$kq) die($this->db->error);
		$row=$kq->fetch_assoc();
		$_SESSION['urlHinh'][$idDT]=$row['urlHinh'];
		$_SESSION['dayTenDT'][$idDT]=$row['TenDT'];
		$_SESSION['daySoLuong'][$idDT]+=1;
		$_SESSION['dayDonGia'][$idDT]=$row['Gia'];
		if($_SESSION['daySoLuong'][$idDT]>$row['SoLuongTonKho']){
			$_SESSION['daySoLuong'][$idDT]=$row['SoLuongTonKho'];
		}
	}
	if($action=='remove'){
		settype($idDT,"int");
		unset($_SESSION['daySoLuong'][$idDT]);
		unset($_SESSION['dayDonGia'][$idDT]);
		unset($_SESSION['dayTenDT'][$idDT]);
		
		
	}
	if ($action=="update"){
   $iddt_arr = $_POST['iddt_arr']; 
   $soluong_arr = $_POST['soluong_arr']; 
  	for($i=0; $i<count($iddt_arr);$i++){
	  $idDT = $iddt_arr[$i]; settype($idDT,"int"); if ($idDT<=0) continue;
     $soluong=$soluong_arr[$i];settype($soluong,"int");
     if ($soluong<=0) continue;
     $kq = $this->chiTietSP($idDT);
     $row = $kq->fetch_assoc();
     $_SESSION['dayTenDT'][$idDT] = $row['TenDT'];
     $_SESSION['dayDonGia'][$idDT] = $row['Gia'];
     $_SESSION['daySoLuong'][$idDT] = $soluong;
     if ($_SESSION['daySoLuong'][$idDT]>$row['SoLuongTonKho']) $_SESSION['daySoLuong'][$idDT] = $row['SoLuongTonKho'];

   } //for
} //update


}
function chiTietSP($idDT){
   $sql="SELECT * FROM dienthoai WHERE AnHien = 1 AND idDT=$idDT";
   $kq = $this->db->query($sql);
   if(!$kq) die( $this-> db->error);
   return $kq;
}
function LuuDonHang(&$error){    
  $hoten=$this->db->escape_string( trim(strip_tags( $_SESSION['DonHang']['hoten'] ) ) );
  $dienthoai = $this->db->escape_string(  trim( strip_tags($_SESSION['DonHang']['dienthoai'] ) ) );
  $diachi = $this->db->escape_string(  trim( strip_tags($_SESSION['DonHang']['diachi'] ) ) );     
  $email = $this->db->escape_string(  trim( strip_tags($_SESSION['DonHang']['email'] ) ) );
  $pttt = $this->db->escape_string(  trim( strip_tags( $_SESSION['DonHang']['payment'] ) ) );      
  $ptgh = $this->db->escape_string(  trim( strip_tags( $_SESSION['DonHang']['delivery'] ) ) );	
  
  //kiểm tra dữ liệu  
  if (count($_SESSION['daySoLuong'])==0) $error[] = "Bạn chưa chọn sản phẩm nào"; //sẽ thêm vào dãy error khi phương thức giao hàng, thanh toán,dãy số lượng không có
  if ($hoten == "") $error[] = "Bạn chưa nhập họ tên";
  if ($diachi == "") $error[] = "Bạn chưa nhập địa chỉ";
  if ($email == "") $error[] = "Bạn chưa nhập email";
  if ($dienthoai== "") $error[] = "Bạn ơi! Điện thoại người nhận chưa có";
  if ($pttt=="") $error[] = "Bạn chưa chọn phương thức thanh toán";
  if ($ptgh=="") $error[] = "Bạn chưa chọn phương thức giao hàng";
  if (count($error)>0) return;//thoát khoit hàm  lập tức khi phát hiện biến erorr có lỗi
  
  //lưu dữ liệu vào db    
  if (isset($_SESSION['DonHang']['idDH'])==false) {
	$sql="INSERT INTO donhang SET tennguoinhan = '$hoten',diachi =
     '$diachi', dtnguoinhan = '$dienthoai',	idpttt = '$pttt',idptgh=
     '$ptgh', thoidiemdathang = now()";
	$kq = $this->db->query($sql);
	if(!$kq) die( $this-> db->error);
	$_SESSION['DonHang']['idDH'] = $this->db->insert_id;// lấy giá trị của id mới đc tăng tự động( lấy được thông tin chi tiết của sản phẩm mới được thêm ra)(lấy nó ra xong lưu vô session luôn
	
  }else{// trong trường hợp mình đã lưu rồi mà khi người ta back trở lại để chỉnh sửa thông tin thì nếu không có update nó sẽ chạy trở lại và ra tiếp tục thêm một đơn hàng mới nữa
   	$idDH = $_SESSION['DonHang']['idDH'];
   	$sql="UPDATE donhang SET tennguoinhan = '$hoten',diachi= 
     '$diachi', dtnguoinhan = '$dienthoai', idpttt='$pttt',idptgh=
     '$ptgh', thoidiemdathang = now() 
	WHERE idDH = $idDH";
	$kq = $this->db->query($sql) ;
	if(!$kq) die( $this-> db->error);
  }
  
} //function LuuDonHang
function LuuChiTietDonHang(){		
   $sosp = count($_SESSION['daySoLuong']);//có thể đếm các dãy đơn giá, tên ddt đếu đc 
   if ($sosp<=0) {echo "Không có sản phẩm"; return;}
   if (isset($_SESSION['DonHang']['idDH'])==false){echo "Kô có idDH"; return;}
   $idDH = $_SESSION['DonHang']['idDH'];
   $sql = "DELETE FROM donhangchitiet WHERE idDH = $idDH";// trường hợp back sửa lại thông tin thì muốn thêm thông tin mới phải hủy bỏ cái cũ để tránh ghi đè
   $this->db->query($sql);
   reset( $_SESSION['daySoLuong'] ); 
   reset( $_SESSION['dayDonGia'] );
   reset( $_SESSION['dayTenDT'] );		
   for ($i = 0; $i<$sosp ; $i++) {
       $idDT = key( $_SESSION['daySoLuong'] );
       $tendt = current( $_SESSION['dayTenDT'] ); // lấy giá trị của phần tử hiện hành mà con trỏ đang trỏ đến sau khi ta lặp qua ba dãy
       $soluong = current( $_SESSION['daySoLuong'] );
       $gia = current( $_SESSION['dayDonGia'] );
       $sql ="INSERT INTO donhangchitiet (idDH,idDT,TenDT,SoLuong,Gia)
              VALUES ($idDH, $idDT, '$tendt',$soluong, $gia)";		
       $this->db->query($sql);
       next( $_SESSION['daySoLuong'] );  
	 next( $_SESSION['dayDonGia'] );
       next( $_SESSION['dayTenDT'] );
   }//for
}//function LuuChiTietDonHang

function SanPhamTrongLoai($TenLoai,$pageNum, $pageSize,&$totalRows ){
   $TenLoai = $this->db->escape_string($TenLoai);
   $startRow = ($pageNum-1)*$pageSize;
	if($startRow<0) $startRow=0;
  $sql="SELECT idDT, TenDT, urlHinh,Gia FROM dienthoai  WHERE AnHien = 1
   AND idLoai in (select idLoai FROM loaisp WHERE TenLoai='$TenLoai') 
   ORDER BY NgayCapNhat DESC LIMIT $startRow , $pageSize ";	
   $kq = $this->db-> query($sql);
   if(!$kq) die( $this-> db->error);	
	
   $sql="SELECT count(*) FROM dienthoai WHERE AnHien = 1 
   AND idLoai in (select idLoai FROM loaisp WHERE TenLoai='$TenLoai')";   
   $rs = $this->db->query($sql) ;	
   $row_rs = $rs->fetch_row();
   $totalRows = $row_rs[0];
   if(!$kq) die( $this-> db->error);	
   return $kq;		
}

function pagesList1($baseURL,$totalRows,$pageNum,$pageSize,$offset){
   if ($totalRows<=0) return "";
   $totalPages = ceil($totalRows/$pageSize);
   if ($totalPages<=1) return "";
   $from = $pageNum - $offset;	
   $to = $pageNum + $offset;
   if ($from <=0) { $from = 1;   $to = $offset*2; }
   if ($to > $totalPages) { $to = $totalPages; }
   $links = "<ul class='pagination'>";
   for($j = $from; $j <= $to; $j++) {
   if ($j==$pageNum) 
   $links=$links."<li><a href='$baseURL/$j/' class=active>$j</a></li>";
   else
      $links= $links."<li><a href = '$baseURL/$j/'>$j</a></li>"; 
   } //for
   $links= $links."</ul>";
   return $links; //trả về nguyên khối ul 
} // function pagesList1
function layHinhSP($idDT, $sohinh){
   $sql="SELECT urlHinh FROM hinh  WHERE AnHien = 1 AND
         idDT=$idDT LIMIT 0, $sohinh";
   $kq = $this->db->query($sql);
   if(!$kq) die( $this-> db->error);
   return $kq;
}
function GuiMail($to, $from, $from_name, $subject, $body, $username, $password, &$error){ 
   $error="";
   require_once "class/class.phpmailer.php";      
   require_once "class/class.smtp.php";      
   try {
      $mail = new PHPMailer();  
      $mail->IsSMTP(); 
      $mail->SMTPDebug = 0;  //  1=errors and messages, 2=messages only
      $mail->SMTPAuth = true;  
      $mail->SMTPSecure = 'ssl'; 
      $mail->Host = 'smtp.gmail.com';
      $mail->Port = 465; 
      $mail->Username = $username;  
      $mail->Password = $password;           
      $mail->SetFrom($from, $from_name);
      $mail->Subject = $subject;
      $mail->MsgHTML($body);// noi dung chinh cua mail
      $mail->AddAddress($to);
      $mail->CharSet="utf-8";
      $mail->IsHTML(true);   
      $mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
	    ));
      if(!$mail->Send()) {$error='Loi:'.$mail->ErrorInfo; return false;}
      else { $error = ''; return true; }
   } 
   catch (phpmailerException $e) { echo "<pre>".$e->errorMessage(); }    
}//function
function CheckEmail($email){
	$sql="select idUser from users where email ='{$email}'";
	$kq = $this->db->query($sql);
	if ($kq->num_rows>0) return false;	
   else return true;
}

function DangKyThanhVien(&$loi){			
 $thanhcong = true;
  //tiếp nhận dữ liệu từ form
 $email = $this->db->escape_string(trim(strip_tags($_POST['mail'])));
 $pass=$this->db->escape_string(trim(strip_tags($_POST['pass'])));
 $repass=$this->db->escape_string(trim(strip_tags($_POST['repass']))); 
 $ht = $this->db->escape_string(trim(strip_tags($_POST['ht'])));	
 $dc=$this->db->escape_string(trim(strip_tags($_POST['dc'])));
 $dt=$this->db->escape_string(trim(strip_tags($_POST['dt'])));
 $p = $_POST['phai']; settype($phai, "int");
  //kiễm tra dữ liệu
	//kt mail
 if ($email == NULL){
     $thanhcong = false;
     $loi['email'] = "Bân chưa nhập email"; }
elseif (filter_var($email,FILTER_VALIDATE_EMAIL)==FALSE) { 
     $thanhcong = false; 
     $loi['email']="Bạn nhập email không đúng";
}elseif ($this->CheckEmail($email)==false) { 
     $thanhcong = false; 
     $loi['email'] = "Email này đã có người dùng";
}
	//ktra pass
if ($pass == NULL) {
    $thanhcong = false; 
    $loi['pass'] = "Bạn chưa nhập mật khẩu";
}elseif (strlen($pass)<6 ) {
    $thanhcong = false; 
    $loi['pass'] = "Mật khẩu của bạn phải >=6 ký tự";
} 
if ($repass == NULL) {
    $thanhcong=false; 
    $loi['repass'] = "Nhập lại mật khẩu đi";
}elseif ($pass != $repass ) { 
    $thanhcong = false; 
    $loi['repass'] = "Mật khẩu 2 lần không giống";
}
	//kt họ tên
	if ($ht == NULL){
    $thanhcong = false; 
    $loi['ht']= "Chưa nhập họ tên";
}
	//kt dien thoai
if ($dt == NULL) {
    $thanhcong = false; 
    $loi['dt'] = "Bạn chưa nhập SDT";
}elseif (strlen($dt)>10 ) {
    $thanhcong = false; 
    $loi['dt'] = "SDT không được quá 10 số";
}elseif (strlen($dt)<10 ) {
    $thanhcong = false; 
    $loi['dt'] = "SDT không được ngắn hơn 10 số";
}  
	//kt địa chỉ
	if ($dc == NULL){
    $thanhcong = false; 
    $loi['dc']= "Bạn Chưa Nhập Địa Chỉ";
}
	
 // chèn dữ liệu
 if ($thanhcong==true) {
     $mahoa = md5($pass);
	 $rd = md5(rand(1,99999));
     $sql = "INSERT INTO  users  
     SET email='$email', password= '$mahoa', hoten='$ht', diachi='$dc',active=0,randomkey='$rd', 
         dienthoai='$dt',gioitinh=$p, ngaydangky=NOW()";
     $kq = $this->db->query($sql) ;
}
	$id = $this->db->insert_id;
$subject = "Kích hoạt tài khoản";
$content = file_get_contents("dangky_thukichhoat.html");		
$link="http://localhost:8080/banhang/kh.php?id=$id&rd=$rd";
$noidungthu = str_replace(	
   array("{email}","{matkhau}","{hoten}","{link}"), 
   array($email,$pass,$ht,$link),$content);
$from = "minh.ng2419@sinhvien.hoasen.edu.vn"; //dùng mail test, đừng dùng mail chính thức
$p = "Minh99824@"; 
$this->GuiMail($email,$from,$ten="Minh",$subject,$noidungthu,$from,$p,$error);
if ($error!="") $loi['guimail']=$error;

 return $thanhcong;
}//DangKyThanhVien
function  DanhDauKichHoatUser($id, $rd){
$sql="UPDATE users SET active=1 WHERE iduser =$id AND randomkey='$rd' AND active=0";
$kq = $this->db->query($sql);
return $this->db->affected_rows;
}
function login($email, $p, &$loi){
    $loi=array();
    $email = $this->db->escape_string(trim(strip_tags($email)));
    $p = $this->db->escape_string(trim(strip_tags($p)));
    $p_mahoa = md5($p);

    $sql="SELECT * FROM users WHERE email='$email'";
    $kq = $this->db->query($sql);
    if ($kq->num_rows==0) { 
      $loi['mail']="<span class='label label-warning'>Email kô có</span>";
      return FALSE;
    }

    $sql="SELECT * FROM users WHERE email='$email' AND password ='$p_mahoa'";
    $kq = $this->db->query($sql);
    if ($kq->num_rows==0) { 
       $loi['pass']="<span class='label label-info'>Mật khẩu kô đúng</span>";
       return FALSE;
     } 
	
	$sql="SELECT * FROM users WHERE email='$email' AND password ='$p_mahoa' AND active=1";
    $kq = $this->db->query($sql);
    if ($kq->num_rows==0) { 
       $loi['active']="<span class='label label-info'>Tài Khoản Của Bạn Chưa Được Kích Hoạt</span>";
       return FALSE;
     } 
    $row = $kq->fetch_assoc();
    $_SESSION['login_id']   = $row['idUser'];
    $_SESSION['login_hoten'] = $row['HoTen'];
    $_SESSION['login_email'] = $row['Email'];
	$_SESSION['login_active'] = $row['active'];
    return TRUE;
}
function checkLogin() {
if (isset($_SESSION['login_id'])== false){
    $_SESSION['error'] = 'Bạn chưa đăng nhập';
    $_SESSION['back'] = $_SERVER['REQUEST_URI'];
    header('location:login.php'); 
    exit();
}
}// checkLogin
function DoiMatKhau($passold, $pass, $repass, &$loi){
$thanhcong = true;
$passold = $this->db->escape_string(trim(strip_tags($passold)));
$pass = $this->db->escape_string(trim(strip_tags($pass)));
$repass = $this->db->escape_string(trim(strip_tags($repass))); 
$iduser = $_SESSION['login_id'];	
// kiểm tra dữ liệu nhập
$pass_min = 3;	
if ($passold==NULL){$thanhcong=false; $loi[]="Chưa nhập mật khẩu cũ"; }
else {
  $sql="select * from users where idUser=$iduser and password= md5('$passold')";
  $rs = $this->db->query($sql);
  if ($rs->num_rows==0) {$thanhcong=false; $loi[]="Pass cũ kô đúng";}	
}
if ($pass==NULL){$thanhcong=false;$loi[]="Chưa nhập pass mới";}
elseif (strlen($pass)<$pass_min) { 
   $thanhcong = false; 
   $loi[] = "Mật khẩu mới quá ngắn.>= $pass_min ký tự";
}
elseif ($pass!=$repass) {
   $thanhcong = false; 
   $loi[] = "Mật khẩu mới nhập 2 lần không giống nhau";
}		
if ($thanhcong ==true) { // cập nhật pass mới
   $sql="UPDATE users SET password=md5('$pass') where iduser=$iduser";
   $this->db->query($sql);
}	
return $thanhcong;
} //function DoiPass

function GuiPass(&$loi){			
 $thanhcong = true;
  //tiếp nhận dữ liệu từ form
 $email = $this->db->escape_string(trim(strip_tags($_POST['mail'])));
 if ($email == NULL){
     $thanhcong = false;
     $loi['email'] = "Bân chưa nhập email"; }
elseif (filter_var($email,FILTER_VALIDATE_EMAIL)==FALSE) { 
     $thanhcong = false; 
     $loi['email']="Bạn nhập email không đúng";
}elseif ($this->CheckEmail($email)==false) { 
     $thanhcong = false; 
     $loi['email'] = "Email này đã có người dùng";
}

 
 // chèn dữ liệu
 if ($thanhcong==true) {
	 // tạo pass mới
	  $passnew = substr(md5(rand(0,9999,0,6))); //gửi email cho ngta 
     $mahoa = md5($passnew);//lưu vào DB
	//cập nhật DB
     $sql = "UPDATE users SET password=md5('$passnew') WHERE email=$email";
     $kq = $this->db->query($sql) ;
						//gửi mail
						$id = $this->db->insert_id;
$subject = "Gửi mật khẩu mới";
$content ="Chào Bạn hoặc ai đo đã yêu cầu gửi mật khẩu từ website. Đây là pass mới: {$passnew}"	;	


$from = "EmailGmailCuaBan"; //dùng mail test, đừng dùng mail chính thức
$p = "MatKhauCuaban"; 
$this->GuiMail($email,$from,$ten="BQT",$subject,$content,$from,$p,$error);
if ($error!="") $loi['guimail']=$error;

}
 return $thanhcong;
}//DangKyThanhVien


}
?>