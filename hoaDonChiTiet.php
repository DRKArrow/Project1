<?php
session_start();
	if(!isset($_SESSION["user"]))
	{
		header("Location: index.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
	#body{margin-top:10px;min-height: 70vh}
</style>
<title>Hóa đơn chi tiết</title>
</head>

<body>
	<?php 
	if(isset($_GET["mahd"]))
	{
		$activepage="";
		$mahd=$_GET["mahd"];
		$user=$_SESSION["user"];
			include ("main/header.php");
			include("ConnectDb/open.php");		
			$result=mysqli_query($con,"select * from tblhoadon inner join tbltaikhoan on tblhoadon.matk=tbltaikhoan.matk inner join tblhoadonchitiet on tblhoadon.mahd=tblhoadonchitiet.mahd inner join tblsanpham on tblhoadonchitiet.masp=tblsanpham.masp where user='$user' and tblhoadon.mahd=$mahd");
		$resultKH=mysqli_query($con,"select sdtgiaohang,diachigiaohang,yeucau,tbltaikhoan.ten from tblhoadon inner join tbltaikhoan on tblhoadon.matk=tbltaikhoan.matk where tblhoadon.mahd=$mahd");
			$rowKH=mysqli_fetch_array($resultKH);
			if(mysqli_num_rows($result)!=0)
			{
		?>
		<div id="body">
			<table style="width:80%;margin:auto" class="table table-hover">
			<caption>Hóa đơn số <?php echo($mahd);?><div style="float:right"><a href="lichSuGiaoDich.php">Back</a></div></caption>
			<tr>
				<td width="15%">Tên khách hàng</td>
				<td><?php echo $rowKH["ten"];?></td>
			</tr>
			<tr>
				<td>Số điện thoại liên lạc</td>
				<td><?php echo $rowKH["sdtgiaohang"];?></td>
			</tr>
			<tr>
				<td>Địa chỉ nhận hàng</td>
				<td><?php echo $rowKH["diachigiaohang"];?></td>
			</tr>
			<tr>
				<td>Yêu cầu của khách hàng</td>
				<td><?php echo $rowKH["yeucau"];?></td>
			</tr>
		</table>
		   <table cellspacing="0" align="center" class="table table-hover" style="width: 80%">
			<thead style="background-color: rgba(165,165,165,1.00)">
			<tr>
				<th>Ảnh sản phẩm</th>
				<th>Tên sản phẩm</th>
				<th>Giá</th>
				<th>Số lượng</th>
				<th>Thành tiền</th>
			</tr>
			</thead>
			
			<?php
			$tongTien=0;			
				while($row=mysqli_fetch_array($result))
				{
				?>
				<tr>
	<?php			$thanhTien=$row["soluong"]*$row["gia"];
					$tongTien+=$thanhTien; ?>
					<td><img src="<?php echo($row["anh"]);?>" height="150px" /></td>
					<td><?php echo($row["tensp"]);?></td>
					<td><?php echo(number_format($row["gia"],0,",","."));?></td>
					<td><?php echo($row["soluong"]);?></td>
					<td><?php echo(number_format($thanhTien,0,",","."));?></td>
				</tr>
				<?php
				}
				include("ConnectDb/close.php");
			?>
			<tfoot>
				<tr>
					<td colspan="7"><p style="font-weight:bold;color:black;font-size:1em" align="right">Tổng tiền: <?php echo (number_format($tongTien,0,",","."));?> VNĐ</p></td></form>
				</tr> 
				<tr>
					<td colspan="7"><p align="left" style="float:left;color:darkgrey">*Giảm giá 10% cho các hóa đơn trên 100.000.000 VNĐ</p><p style="font-weight:bold;color:black;font-size:1em;float:right" align="right">Giảm giá: <?php if($tongTien>=100000000) { $giamgia="10%"; $tongTien=$tongTien*0.9; } else { $giamgia="0%"; } echo $giamgia;?></p>
				</tr> 
				<tr>
					<td colspan="7"><p style="font-weight:bold;color:black;font-size:1.5em;" align="right">Thành tiền: <?php echo (number_format($tongTien,0,",","."));?> VNĐ</p>
				</tr> 
			</tfoot>
			</table>
		</div>
		<?php
			}
			else
			{
			?><div id="body">
			<?php
				echo "Bạn chưa thực hiện giao dịch nào!";
				?>
				</div>
				<?php
			}
			include ("main/footer.php");
	}
	else
	{
		header("Location: lichSuGiaoDich.php");
	}
	?>
</body>
</html>
