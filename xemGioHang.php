<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Giỏ hàng</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
		<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript">
		function notify() {
			$.notify("Sai mật khẩu !", "error");
		}
</script>
<style>
#body{margin:auto;min-height: 70vh}
.imgaction{height:30px}
</style>
</head>

<body <?php if(isset($_GET['err']))
			{
				if($_GET['err']=='errlogin')
				{
					?>
						onLoad="notify()"
					<?php
				}
			}
?>>
	<?php
	if(isset($_SESSION["gioHang"]))
	{
		$count=count($_SESSION['gioHang']);
		$activepage="";
		if($count==0)
		{
			header("Location: index.php?gioHang=none");
			unset($_SESSION['gioHang']);
		}
		else
		{
			include("main/header.php");
	
			$gioHang=array();
			$gioHang=$_SESSION["gioHang"];
			?>
			<div id="body">
		   <table cellspacing="0" align="center" class="table table-hover" style="width: 80%">
		   <caption>Giỏ hàng</caption>
			<thead style="background-color: rgba(165,165,165,1.00)">
			<tr>
				<th>Ảnh sản phẩm</th>
				<th>Mã sản phẩm</th>
				<th>Tên sản phẩm</th>
				<th>Giá</th>
				<th>Số lượng</th>
				<th>Thành tiền</th>
				<th></th>
			</tr>
			</thead>
			
			<?php
			$tongTien=0;
			foreach($gioHang as $maSp=>$soLuong)
			{
				
				include("ConnectDb/open.php");
				$sql="select * from tblsanpham where masp='$maSp'";
				$result=mysqli_query($con,$sql);
				$row=mysqli_fetch_array($result);
				$thanhTien=$soLuong*$row["gia"];
				$tongTien+=$thanhTien;
				?>
				<tr>
					<td><img src="<?php echo($row["anh"]);?>" height="70px" /></td>
					<td><?php echo($row["masp"]);?></td>            
					<td><?php echo($row["tensp"]);?></td>
					<td><?php echo(number_format($row["gia"],0,",","."));?></td>
					<td> <form action="capNhatGioHang.php" method="post"><select name="arrSl[]" style="width:60px" onchange="this.form.submit()">
					<?php
						for($dem=1;$dem<=10;$dem++)
						{
						?>
							<option value="<?php echo $dem;?>" <?php if($soLuong==$dem){?> selected="selected" <?php } ?>><?php echo $dem;?></option>
						<?php
						}
					?>
					</select></td>
					<td><?php echo(number_format($thanhTien,0,",","."));?></td>
					<td><a href="xoaGioHang.php?maSp=<?php echo($row["masp"]);?>" style="color: black" class="btn btn-dark btn-lg" onclick="return confirm('Bạn có muốn xóa sản phẩm khỏi giỏ hàng ?')"><span class="glyphicon glyphicon-trash" ></span></a></td>
				</tr>
				<?php
				include("ConnectDb/close.php");
			}	
			?>
			<tfoot>
					<tr>
						<td colspan="7"><p style="font-weight:bold;color:black;font-size:1em" align="right">Tổng tiền: <?php echo (number_format($tongTien,0,",","."));?> VNĐ</p></td></form>
					</tr>
					<tr>
						<td colspan="7"><p align="left" style="float:left;color:darkgrey">*Giảm giá 10% cho các hóa đơn trên 100.000.000 VNĐ</p><p style="font-weight:bold;color:black;font-size:1em;float:right" align="right">Giảm giá: 
						<?php
							
							if($tongTien>=100000000)
							{
								$giamgia="10%";
								?>
								10%
								<?php
							}
							else
							{
								$giamgia="0%";
								?>
								0%
								<?php
							}
						?>
						</p></td>
					</tr> 
					<tr>
						<td colspan="7"><p style="font-weight:bold;color:black;font-size:1.5em" align="right">Thành tiền: 
						<?php
							if($tongTien>=100000000)
							{
								$tongTien=$tongTien*0.9;
								echo (number_format($tongTien,0,",",".")) .  " VNĐ";
							}
							else
							{
								echo (number_format($tongTien,0,",",".")) .  " VNĐ";
							}
						?>
							</p></td>
					</tr>
					<tr>
					
						<td colspan="7" align="right"><a href="products.php?page=0"><button class="btn btn-primary" type="button" style="color: white;background-color: rgba(57,57,57,1.00);font-weight: bold">Tiếp tục mua hàng</button></a><?php if(!isset($_SESSION["user"])){ ?> 
						<button class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="color: darkgray;background-color: rgba(57,57,57,1.00)">Bạn phải đăng nhập trước khi đặt hàng</button>
						
						<?php } else { ?> <form method="post" action="hoaDon.php"><input type="text" name="giamgia" value="<?php echo $giamgia;?>" style="display:none"><input type="text" name="tongtien" value="<?php echo $tongTien;?>" style="display:none"> <button class="btn btn-primary" type="submit" style="color: white;background-color: rgba(57,57,57,1.00);font-weight: bold">Thanh toán đơn hàng</button>
	 </form> <?php } ?></td>
					
					</tr>
				</tfoot>
			</table>
		</div>
			<?php
			include("main/footer.php");
			}
		}else
	{
		header("Location: index.php?gioHang=none");
	}
	?>
</body>
</html>