<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
<style>
	#content{background:black;width:60%;margin:auto;}
	#background{background:black;width:100%;height:100%}
	.top-left{position:absolute;top:8px}
	#page{position: absolute;bottom:5px}
	.imgresize{max-height: 300px;max-width: 200px;width:100%;height: 100%}
.pagination {
    display: inline-block;
}

.pagination a {
    color: darkgrey;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
}

.pagination a.active {
    background-color:rgba(225,225,225,1.00);
    color: black;
}

.pagination a:hover:not(.active) {background-color: rgba(145,145,145,1.00);}
	

	#footer{background:rgba(14,14,14,1.00)}
	.afooter{color:darkgrey}
	.pfooter{color: darkgray}
	.h3footer{color: white}

</style>
</head>

<body>
<?php
	$activepage="products";
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
	$sql="select * from tblsanpham limit $start,$soSanPhamTren1trang";
	if(isset($_GET["brand"]))
	{
		$brand=$_GET["brand"];
		$sql="select * from tblsanpham where mansx='$brand' limit $start,$soSanPhamTren1trang";
		$sqlTongSanPham="select count(*) as TongSanPham from tblsanpham where mansx='$brand'";
	}
	if(isset($_GET["keyword"]))
	{
		$key=$_GET["keyword"];
		$sql="select * from tblsanpham where tensp like '%$key%' limit $start,$soSanPhamTren1trang";
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
				<li class="col-xs-6 col-sm-4 col-md-3">
					<table style="margin:5px;max-width:300px;" width="100%" border="1px">
						<tr>
							<td><a href="sanPhamChiTiet.php?masp=<?php echo $row["masp"]; ?>"><div style="position:relative">
							<?php if($row["tinhtrang"]==1) { ?><img src="<?php echo($row["anh"]);?>" class="imgresize"/><?php } else {?><img src="<?php echo($row["anh"]);?>" class="imgresize" style="opacity:0.4;"/></a><div class="top-left" style="color:white;background:grey;width:100%;opacity:0.9;height:22px;font-weight:bold;text-align:center;">HẾT HÀNG</div></div><?php } ?></td>
						</tr>
					
						<tr>
							<td style="color:white;font-weight:bold"><?php echo(number_format($row["gia"],0,",","."));?></td>
						</tr>
					</table>
			</li>
			<?php
		}
			?>
	</ul>
	<?php

		?>
		<nav>
		<ul class="pagination">
			<?php
	for($i=0;$i<$soTrang;$i++)
	{
		if(isset($_GET["brand"]))
		{
			?>
			<?php if($_GET['page']==$i){ ?> <?php }?><a class="active" href="?page=<?php echo($i);?>&brand=<?php echo $brand;?>"><?php echo($i+1);?></a>
		
			<?php
		}else if(isset($_GET["keyword"]))
		{
			?>
			<?php if(isset($_GET['page']))
			{
				if($_GET['page']==$i) { ?>  <?php }}?><a class="active" href="?page=<?php echo($i);?>&keyword=<?php echo $key;?>"><?php echo($i+1);?></a>
			<?php
		}
		else
		{
			?>
			<?php if(isset($_GET['page']))
			{
			if($_GET['page']==$i){ ?> <?php }}?><a class="active" href="?page=<?php echo($i);?>"><?php echo($i+1);?></a>
	<?php
		}

	}
	?>
		</ul>
		</nav>
	
	
		
		
	
</div>
<?php
	include ("ConnectDb/close.php");
	include ("main/footer.php");
?>
</body>
</html>