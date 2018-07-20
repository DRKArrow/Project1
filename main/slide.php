<?php
	if(!isset($activepage))
	{
		header("Location: ../index.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<!-- include jQuery + carouFredSel plugin -->
<script type="text/javascript" language="javascript" src="jquery.carouFredSel-6.2.1-packed.js"></script>


<!-- fire plugin onDocumentReady -->
<script type="text/javascript" language="javascript">
			$(function() {

				$('#foo4').carouFredSel({
					responsive: true,
					width: '100%',
					scroll: 1,
					items: {
						width: 230,
					//	height: 200,	//	optionally resize item-height
						visible: {
							min: 2,
							max: 6
						}
					}
				});

				$('#foo5').carouFredSel({
					width: '100%',
					scroll: 2
				});

			});
		</script>
<style>
.containercar{width:65%;margin: auto;margin-top:4vh}
.list_carousel {
background-color: black;
margin: 0 0 30px 60px;
border-left:3px solid white;
border-right:3px solid white;
}
.list_carousel ul {
margin: 0;
padding: 0;
list-style: none;
display: block;
}
.list_carousel li {
width: 200px;
height:200px;
padding: 0;
margin: 6px;
display: block;
float: left;
}
.list_carousel.responsive {
width: auto;
margin-left: 0;
}

ul li img{width:200px;height:200px;}
</style>
</head>

<body>
<div class="containercar">
<div class="list_carousel responsive">
<ul id="foo4">
<li><a href="products.php?page=0&brand=CD"><img src="Images/giaodien/CDlogo.jpg" /></a></li>
<li><a href="products.php?page=0&brand=KBR"><img src="Images/giaodien/KBRlogo.jpg" /></a></li>
<li><a href="products.php?page=0&brand=RO"><img src="Images/giaodien/ROlogo.jpg" /></a></li>
<li><a href="products.php?page=0&brand=GD"><img src="Images/giaodien/GDlogo.jpg" /></a></li>
<li><a href="products.php?page=0&brand=VLA"><img src="Images/giaodien/VLAlogo.jpg"  /></a></li>
<li><a href="products.php?page=0&brand=DSRO"><img src="Images/giaodien/DSROlogo.jpg"  /></a></li>
<li><a href="products.php?page=0&brand=LF"><img src="Images/giaodien/LFlogo.jpg"  /></a></li>
<li><a href="products.php?page=0&brand=OBS"><img src="Images/giaodien/OBSlogo.jpg"  /></a></li>
<li><a href="products.php?page=0&brand=SOS"><img src="Images/giaodien/SOSlogo.jpg" /></a></li>
<li><a href="products.php?page=0&brand=OW"><img src="Images/giaodien/OWlogo.jpg" /></a></li>
<li><a href="products.php?page=0&brand=SFTM"><img src="Images/giaodien/SFTMlogo.jpg"  /></a></li>
<li><a href="products.php?page=0&brand=Y3"><img src="Images/giaodien/Y3logo.jpg"/></a></li>
<li><a href="products.php?page=0&brand=J7"><img src="Images/giaodien/J7logo.jpg" /></a></li>
</ul>
</div>
</div>
</body>
</html>