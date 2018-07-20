<?php
	if(!isset($activepage))
	{
		header("Location: ../index.php");
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
	#footer{background:rgba(14,14,14,1.00)}
	.afooter{color:darkgrey}
	.pfooter{color: darkgray}
	.h3footer{color: white}
	
	</style>

</head>

<body>
	<div id="footer" align="center" class="container-fluid" >
		<div class="row" style="width:100%">
 			<div class="col-sm-3">
				<h2 class="h3footer">Liên hệ</h3>
				<a target="_blank" href="https://www.facebook.com/hoangviet.ho101" class="afooter">Facebook</a><br>

				<a target="_blank" href="https://www.instagram.com/hoangviet____/" class="afooter">Instagram: Hoang Viet</a><br>
				<a target="_blank" href="https://www.instagram.com/dungzin_/" class="afooter">Instagram: Tuan Dung</a>			
				<h2 class="h3footer">Về chúng tôi</h3>
				<p>Đinh Tuấn Dũng (Leader)</p>
				<p>Hoàng Đức Việt</p>
				<p>Đinh Quốc Cường</p>
			</div>
			<div class="col-sm-3">
				<h2 class="h3footer">Địa chỉ</h2>
				<a target="_blank" href="https://www.google.com/maps/place/H%E1%BB%8Dc+vi%E1%BB%87n+CNTT+B%C3%A1ch+Khoa/@21.003686,105.847182,18z/data=!4m5!3m4!1s0x0:0xe0dd0b2919d48ce9!8m2!3d21.0038429!4d105.8475741">Tòa nhà BKACAD, A17 Tạ Quang Bửu, Hà Nội</a>
				<h2 class="h3footer">Số điện thoại</h2>
				<p class="pfooter">+84934655469</p>
				<p class="pfooter">+841632406674</p>
			</div>
			<div class="col-sm-6">
				<div id="map" style="width:60%;height:300px;"></div>

<script>
function myMap() {
  var myCenter = new google.maps.LatLng(21.0038291,105.8475502,21);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom:17}
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
	
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAU_SmvpqhoRZUupPfrGBM2MPfVebMp2Po&callback=myMap"></script>

			</div>
		</div>
	</div>
</body>
</html>
