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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
	#body{margin-top:10px}
	input[type="text"]{width:15%}
	.imgaction{height:30px}
</style>
<title>Sửa đơn hàng</title>
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
			$result=mysqli_query($con,"select tblhoadon.mahd,tblhoadonchitiet.masp,tblsanpham.tensp,tblsanpham.gia,tblsanpham.anh,tblhoadonchitiet.soluong from tblhoadon inner join tbltaikhoan on tblhoadon.matk=tbltaikhoan.matk inner join tblhoadonchitiet on tblhoadon.mahd=tblhoadonchitiet.mahd inner join tblsanpham on tblhoadonchitiet.masp=tblsanpham.masp where user='$user' and tblhoadon.mahd=$mahd");
		$resultKH=mysqli_query($con,"select sdtgiaohang,diachigiaohang,yeucau,tbltaikhoan.ten from tblhoadon inner join tbltaikhoan on tblhoadon.matk=tbltaikhoan.matk where tblhoadon.mahd=$mahd");
			$rowKH=mysqli_fetch_array($resultKH);
			if(mysqli_num_rows($result)!=0)
			{
		?>
		<div id="body">
			<form method="post" action="suaDonHangProcess.php?mahd=<?php echo $mahd?>" id="formSua">
			<table style="width:80%;margin:auto" class="table table-hover">
			<caption>Hóa đơn số <?php echo($mahd);?><div style="float:right"><a href="lichSuGiaoDich.php">Back</a></div></caption>
			<tr>
				<td width="15%">Tên khách hàng</td>
				<td><?php echo $rowKH["ten"];?></td>
			</tr>
			<tr>
				<td>Số điện thoại liên lạc</td>
				<td><input class="form-control" type="text" name="txtSdt" value="<?php echo $rowKH["sdtgiaohang"];?>"></td>
			</tr>
			<tr>
				<td>Địa chỉ nhận hàng</td>
				<td><input class="form-control" type="text" name="txtDiachi" value="<?php echo $rowKH["diachigiaohang"];?>"></td>
			</tr>
			<tr>
				<td>Yêu cầu của khách hàng</td>
				<td><textarea class="form-control" style="width:500px;height: 100%;resize:none" maxlength="150" name="yeucau"><?php echo $rowKH["yeucau"];?></textarea></td>
			</tr>
		</table>
			</form>
		   <table cellspacing="0" align="center" class="table table-hover" style="width: 80%">
			<thead style="background-color: rgba(165,165,165,1.00)">
			<tr>
				<th>Ảnh sản phẩm</th>
				<th>Tên sản phẩm</th>
				<th>Giá</th>
				<th>Số lượng</th>
				<th>Thành tiền</th>
				<th>Thao tác</th>
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
					<td>
					<form method="post" action="suaSlDonHang.php?masp=<?php echo $row['masp'];?>&mahd=<?php echo $row['mahd'];?>" id="form<?=$row['masp']?>">
                    <select name="ddlSl" onchange="document.getElementById('form<?=$row['masp']?>').submit()">
                       <?php
						for($i=1;$i<=10;$i++)
						{
							?>
							<option value="<?php echo $i; ?>" <?php if($row['soluong']==$i){?> selected="selected" <?php } ?>><?php echo $i; ?></option>
							<?php
						}
						?>
                    </select>
                </form>
					<td><?php echo(number_format($thanhTien,0,",","."));?></td>
					<td><a class="btn btn-dark btn-lg" style="color: black" href="suaDonHangProcess.php?mahd=<?php echo $mahd;?>&masp=<?php echo $row['masp'];?>&action=xoasp" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này khỏi đơn hàng ?')"><span class="glyphicon glyphicon-trash"></span></a></td>
				</tr>
				<?php
				}
				include("ConnectDb/close.php");
			?>
			<tfoot>
				<tr>
					<td colspan="7"><p style="font-weight:bold;color:black;font-size:1em" align="right">Tổng tiền: <?php echo (number_format($tongTien,0,",","."));?></p></td></form>
				</tr> 
				<tr>
					<td colspan="7"><p style="color:darkgrey;font-size:1em;float:left;font-weight: bold">*Giảm giá 10% cho các hóa đơn trên 100.000.000 VNĐ</p>
						<p style="font-weight:bold;font-size:1em;float:right;color:black">Giảm giá: 
						<?php
						if($tongTien>=100000000)
						{
							$tongTien*=0.9;
							?>
							10%
							<?php
						}else
						{
							?>
							0%
							<?php
						}
						?>
						
						</p></td>
				</tr>
				<tr>
					<td colspan="7"><p style="font-weight:bold;color:black;float:right;font-size:1.5em">Thành tiền: <?php echo (number_format($tongTien,0,",","."));?> VNĐ</p></td>
				</tr>
				<tr>
					<td colspan="7" align="right">
					<button class="btn btn-primary" type="button" style="color: white;background-color: rgba(57,57,57,1.00);font-weight: bold" onClick="document.getElementById('formSua').submit()">Sửa đơn hàng</button>
					</td>
				</tr>
			</tfoot>
			</table>
		</div>
		<?php
			}
			else
			{
				mysqli_query($con,"delete from tblhoadon where mahd=$mahd");
				?>
					<meta http-equiv="Refresh" content="0,lichSuGiaoDich.php">
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
