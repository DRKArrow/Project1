<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title>Products</title>
	
<style>
	#content{background:black;width:60%;margin:auto;}
	#background{background:black;width:100%;height:100%}
	.top-left{position:absolute;top:8px}
	#page{position: absolute;bottom:5px}
	.imgresize{max-height: 300px;max-width: 200px;width:100%;height: 100%}
	.pagination {
    display: inline-block;
}

.pagination {
    display: inline-block;
}

.pagination a {
    color: white;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
}

.pagination a.active {
    background-color: rgba(255,255,255,0.5);
    color: white;
	    text-decoration: none;

}

	.pagination a:hover:not(.active) {background-color: #ddd;    text-decoration: none;}
	.pagination a:not(.active) {background-color: #2B2B2B;    text-decoration: none;}

}

	#footer{background:rgba(14,14,14,1.00)}
	.afooter{color:darkgrey}
	.pfooter{color: darkgray}
	.h3footer{color: white}


.box{    
max-height: 300px;
max-width: 200px;
text-align: center;    
position: relative;    
overflow: hidden;
}
 
.box img{    
height: 100%;
width: 100%;
max-height:300px;
max-width:200px;
}
.box .box-content{    
width: 100%;    
height: 100%;
position: absolute;    
top: 0;    
left: 0;    
background: rgba(255, 255, 255, 0.6);    
color: #f9eee8;    
padding: 30px 20px;    
transform: scale(0);    
transition: all 0.5s ease 0s;
}
 
.box:hover .box-content{    
transform: scale(1);
}
 
.box .title{  
font-size: 18px;    
font-weight: 900;   
margin-bottom: 15px;  
text-align: center; 
font-family: Helvetica, sans-serif; 
color:rgba(50,50,50,1.00);
}
 
.box .description{    
font-size: 16px;  
font-weight: 900;
text-align: center; 
font-family: Arial, Helvetica, sans-serif;
color: rgba(50,50,50,1.00);
}


.box .heading{  
width: 100%;    
position: absolute; 
bottom: 0;  
left: 0;    
background: rgba(12, 12, 12,0.6);    
color: #ffffff; 
text-align: center; 
padding: 20px 0;    
transition: all 0.5s ease 0s;   
font-family: Arial, Helvetica, sans-serif;
}

.box .outoforder{  
width: 100%;    
position: absolute; 
top: 0;  
left: 0;    
background: rgba(12, 12, 12,0.6);    
color: #ffffff; 
text-align: center; 
padding: 20px 0;    
transition: all 0.5s ease 0s;   
font-family: Arial, Helvetica, sans-serif;
}
  
.box:hover .heading{    
bottom: -30%;   
font-family: Arial, Helvetica, sans-serif;
}

.box:hover .outoforder{    
top: -30%;   
font-family: Arial, Helvetica, sans-serif;
}
  
.box .heading h3{   
margin: 0;  
font-size: 12px;    
font-weight: 800;   
font-family: Verdana, Arial, Helvetica, sans-serif;
}

.box .outoforder h3{   
margin: 0;  
font-size: 12px;    
font-weight: 800;   
font-family: Verdana, Arial, Helvetica, sans-serif;
}
  
@media only screen and (max-width: 990px){    
.box{ 
margin-bottom: 20px; 
}
}
 
@media only screen and (max-width: 360px){    
.box .box-content{ 
padding: 10px; 
}    
 
.box:hover .heading{ 
bottom: -40%; 
}
}

</style>
</head>

<body>
<?php
	if(isset($_GET['cate']))
	{
		$activepage='category';
	}
	else
	{
		$activepage="products";
	}
	include ("main/header.php");
	include ("ConnectDb/open.php");
	$sqlTongSanPham="select count(*) as TongSanPham from tblsanpham";
	$page=0;
	if(isset($_GET["page"]))
	{
		$page=$_GET["page"];
	}
	$soSanPhamTren1trang=20;
	$start=$page*$soSanPhamTren1trang;
	$sql="select anh,tblnsx.tennsx,gia,tensp,masp,tinhtrang from tblsanpham inner join tblnsx on tblsanpham.mansx=tblnsx.mansx limit $start,$soSanPhamTren1trang";
	if(isset($_GET["brand"]))
	{
		include ("main/brand.php");
		$brand=$_GET["brand"];
		$sql="select anh,tblnsx.tennsx,gia,tensp,masp,tinhtrang from tblsanpham inner join tblnsx on tblsanpham.mansx=tblnsx.mansx where tblsanpham.mansx='$brand' limit $start,$soSanPhamTren1trang";
		$sqlTongSanPham="select count(*) as TongSanPham from tblsanpham where mansx='$brand'";
	}
	if(isset($_GET["cate"]))
	{
		$cate=$_GET["cate"];
		$sql="select anh,tblnsx.tennsx,gia,tensp,masp,tinhtrang from tblsanpham inner join tblnsx on tblsanpham.mansx=tblnsx.mansx inner join tbldanhmuc on tblsanpham.madm=tbldanhmuc.madm where tblsanpham.madm='$cate' limit $start,$soSanPhamTren1trang";
		$sqlTongSanPham="select count(*) as TongSanPham from tblsanpham where madm='$cate'";
	}
	if(isset($_GET["keyword"]))
	{
		$key=$_GET["keyword"];
		$sql="select anh,tblnsx.tennsx,gia,tensp,masp,tinhtrang from tblsanpham inner join tblnsx on tblsanpham.mansx=tblnsx.mansx where tensp like '%$key%' limit $start,$soSanPhamTren1trang";
		$sqlTongSanPham="select count(*) as TongSanPham from tblsanpham where tensp like '%$key%'";
	}
	$resultTongSanPham=mysqli_query($con,$sqlTongSanPham);
	$rowTongSanPham=mysqli_fetch_array($resultTongSanPham);
	$TongSanPham=$rowTongSanPham["TongSanPham"];
	$soTrang=ceil($TongSanPham/$soSanPhamTren1trang);
	$result=mysqli_query($con,$sql);
	?>
<div id="background">
	<div id="content" style="background-color: black;min-height: 70vh" align="center">
    	
		<?php
			if(mysqli_num_rows($result)==0)
			{
				?>
				<p align="center"><img src="Images/giaodien/bn-out-of-stock.png"></p>
				<?php
			}
		?>
		<ul class="row list-unstyled">
		<?php
		while($row=mysqli_fetch_array($result))
		{
			?>
				
				
			  <div class="col-xs-6 col-sm-4 col-md-3" style="padding: 10px"> 
			   <div class="box"> <img src="<?php echo $row['anh'];?>"> 
				<div class="box-content"> 
				 <h4 class="title"><?php echo $row['tennsx'];?>
				 </h4> 
				 <p class="description"> <?php echo (number_format($row["gia"],0,",","."));?> VNĐ</p> 
					<div class="desfooter" align="center"><a href="sanPhamChiTiet.php?masp=<?php echo $row['masp'];?>"><button class="btn btn-dark" type="submit" style="color: white;background-color: rgba(20,20,20, 0.9);font-weight: bold">Xem chi tiết</button></a></div> 
				   </div>
				 
				  
				<div class="heading"> 
				 <h3><?php echo $row['tensp'];?></h3> 
				</div> 
				<?php if($row['tinhtrang']==2) { ?>
				<div class="outoforder"> 
				 <h3>HẾT HÀNG</h3> 
				</div> 
				<?php } ?>
			   </div> 
			  </div> 
			<?php
		}
			?>
		</ul>
	<?php

		?>
		<div class="pagination">
			<?php
	for($i=0;$i<$soTrang;$i++)
	{
		if(isset($_GET["brand"]))
		{
			?>
			<a href="?page=<?php echo($i);?>&brand=<?php echo $brand;?>" <?php if($_GET['page']==$i){ ?> class="active" <?php }?>><?php echo($i+1);?></a>
		
			<?php
		}else if(isset($_GET["keyword"]))
		{
			?>
			<a href="?page=<?php echo($i);?>&keyword=<?php echo $key;?>" <?php if(isset($_GET['page']))
			{
				if($_GET['page']==$i) { ?> class="active" <?php }}?>><?php echo($i+1);?></a>
			<?php
		}
		else
		{
			?>
			<a href="?page=<?php echo($i);?>" <?php if(isset($_GET['page']))
			{
			if($_GET['page']==$i){ ?> class="active" <?php }}?>><?php echo($i+1);?></a>
	<?php
		}

	}
	?>
		</div>
</div>
<?php
	include ("ConnectDb/close.php");
	include ("main/footer.php");
?>
</body>
</html>