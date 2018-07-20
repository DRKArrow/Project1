<?php
	if(!isset($_SESSION["user"]) || ($_SESSION["mapq"]==3) )
	{
		header("Location: ../../index.php");
	}
	if(!isset($_GET["page"]))
	{
		header("Location: ../giaodien.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style>
	#body{margin-top:10px}
</style>
<title>Untitled Document</title>
</head>

<body>
	<?php 
	if(isset($_GET["mahd"]))
	{
		$mahd=$_GET["mahd"];	
			$result=mysqli_query($con,"select sdtgiaohang,diachigiaohang,tbltaikhoan.ten,yeucau,tblhoadon.mahd,tblhoadonchitiet.masp,tblsanpham.tensp,tblsanpham.gia,tblsanpham.anh,tblhoadonchitiet.soluong from tblhoadon inner join tbltaikhoan on tblhoadon.matk=tbltaikhoan.matk inner join tblhoadonchitiet on tblhoadon.mahd=tblhoadonchitiet.mahd inner join tblsanpham on tblhoadonchitiet.masp=tblsanpham.masp where tblhoadon.mahd=$mahd");
			$resultKH=mysqli_query($con,"select sdtgiaohang,diachigiaohang,yeucau,tbltaikhoan.ten from tblhoadon inner join tbltaikhoan on tblhoadon.matk=tbltaikhoan.matk where tblhoadon.mahd=$mahd");
			$rowKH=mysqli_fetch_array($resultKH);
			if(mysqli_num_rows($result)!=0)
			{
		?>
		<div id="body">	
		<table style="width:80%;margin:auto" class="table table-hover">
			<caption>Hóa đơn số <?php echo($mahd);?><div style="float:right"><a href="?page=5">Back</a></div></caption>
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
					<td><img src="../<?php echo($row["anh"]);?>" height="150px" /></td>
					<td><?php echo($row["tensp"]);?></td>
					<td><?php echo(number_format($row["gia"],0,",","."));?></td>
					<td><?php echo($row["soluong"]);?></td>
					<td><?php echo(number_format($thanhTien,0,",","."));?></td>
				</tr>
				<?php
				}
			?>
			<tfoot>
				<tr>
					<td colspan="7"><p style="font-weight:bold;color:black" align="right">Tổng tiền: <?php echo (number_format($tongTien,0,",","."));?> VNĐ</p></td></form>
				</tr>
				<tr>
					<td colspan="7"><p style="font-weight:bold;color:black;font-size:1em;float:right" align="right">Giảm giá: <?php if($tongTien>=100000000) { $giamgia="10%"; $tongTien=$tongTien*0.9; } else { $giamgia="0%"; } echo $giamgia;?></p>
				</tr> 
				<tr>
					<td colspan="7"><p style="font-weight:bold;color:black;font-size:1.5em;" align="right">Thành tiền: <?php echo (number_format($tongTien,0,",","."));?> VNĐ</p>
				</tr> 
			</tfoot>
			</table>
		</div>
		<?php
			}
	}
	?>
</body>
</html>
