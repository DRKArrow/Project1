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
<style>
	#center{background-color: rgba(6,6,6,1.00);width: 100%;height:100%}
	
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap.js"type="text/javascript"></script>
<script>

</script>
</head>

<body>
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
				<img src="Images/giaodien/sb_1445057948_0.jpg" style="width:100%;margin-top: 50px;display: block">
				<img src="Images/giaodien/sb_1445054293_635.jpg" style="width: 49.5%;margin-top: 10px;float: left"><img src="Images/giaodien/sb_1445056183_635.jpg" style="width: 49.5%;margin-top: 10px;float: right">
			</div>
			
		</div>
</body>
</html>
