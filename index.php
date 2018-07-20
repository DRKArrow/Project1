<?php	
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home - The Dark Gallery</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
<script type="text/javascript">
		function notifygh() {
			$.notify("Không có sản phẩm nào trong giỏ hàng !", "error");
		}
		function notifyls() {
			$.notify("Bạn chưa thực hiện giao dịch nào !", "error");
		}
		function notify() {
			$.notify("Bạn đã đặt hàng thành công !", "success");
		}
		function notifyerr() {
			$.notify("Sai mật khẩu !", "error");
		}
		function notifyerrsignup() {
			$.notify("Tài khoản đã tồn tại !", "error");
		}
		function notifydoimk() {
			$.notify("Bạn đã đổi mật khẩu thành công !", "success");
		}
		function notifysignup() {
			$.notify("Bạn đã đăng ký thành công !", "success");
		}
		
	
</script>
<style>
	#center{background-color: rgba(6,6,6,1.00);width: 100%;height:100%}
	#footer{background:rgba(14,14,14,1.00)}
	a{color:darkgrey}
	p{color: darkgray}
	h3{color: white}	
</style>
	
</head>

<body <?php
	if(isset($_GET['gioHang']))
	{
		if($_GET['gioHang']=='none')
		{
			?>
			onLoad="notifygh()"
			<?php
		}
	}
	if(isset($_GET['history']))
	{
		if($_GET['history']=='none')
		{
			?>
			onLoad="notifyls()"
			<?php
		}
	}
	if(isset($_GET['dathang']))
	{
		if($_GET['dathang']=='scf')
		{
			?>
			onLoad="notify()"
			<?php
		}
	}
	if(isset($_GET['err']))
	{
		if($_GET['err']=='errchangepass')
		{
			?>
	  		onLoad="notifyerr()"
	  		<?php
		}
		if($_GET['err']=='errlogin')
		{
			?>
	  		onLoad="notifyerr()"
	  		<?php
		}
		if($_GET['err']=='signup')
		{
			?>
	  		onLoad="notifyerrsignup()"
	  		<?php
		}
	}
	if(isset($_GET['success']))
	{
		if($_GET['success']=='changepass')
		{
			?>
	  		onLoad="notifydoimk()"
	  		<?php
		}
		if($_GET['success']=='signup')
		{
			?>
	  		onLoad="notifysignup()"
	  		<?php
		}
	}
	  
 ?>>
	<?php 
	$activepage="index";
		include ("main/header.php");
	?>
	<div id="center" align="center">
		<div class="container">
			<div id="myCarousel" class="carousel slide" data-ride="carousel"  style="margin-top:5px">
			<ol class="carousel-indicators">
			  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			  <li data-target="#myCarousel" data-slide-to="1"></li>
			  <li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>	

			<div class="carousel-inner">
			  <div class="item active">
				<img src="Images/giaodien/img_4356.jpg" alt="" style="width:100%;">
			  </div>

			  <div class="item">
				<img src="Images/giaodien/img_4364.jpg" alt="Chicago" style="width:100%;">
			  </div>

			  <div class="item">
				<img src="Images/giaodien/img_6254.jpg" alt="New york" style="width:100%;">
			  </div>
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				  <span class="glyphicon glyphicon-chevron-left"></span>
				  <span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
				  <span class="glyphicon glyphicon-chevron-right"></span>
				  <span class="sr-only">Next</span>
				</a>
			</div>
			</div>
			<div "images">
				<img src="Images/giaodien/popularitem.jpg" style="width:100%;margin-top: 50px;display: block">
				<?php
					include ("main/popularitems.php");
				?>
			</div>
			
		</div>
        <hr />
        <?php
		include ("main/slide.php");
		?>
<hr />
	<?php
		include ("main/footer.php");
	?>
</body>
</html>
