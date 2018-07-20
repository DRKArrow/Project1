<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title>Untitled Document</title>
<style>
	#body{margin:auto;}
	textarea{resize: none}
</style>
</head>

<body>
	<?php
	if(!isset($_POST['tongtien']) && !isset($_POST['giamgia']))
	{
		header("Location: xemGioHang.php");
	}
	if(isset($_SESSION["gioHang"]))
	{
		$activepage="";
		$count=count($_SESSION['gioHang']);
		if($count==0)
		{
			header("Location: index.php?gioHang=none");
			unset($_SESSION['gioHang']);
		}
		else
		{
			include("main/header.php");
			include("ConnectDb/open.php");
			$gioHang=array();
			$gioHang=$_SESSION["gioHang"];
			$user=$_SESSION['user'];
			$resultKH=mysqli_query($con,"select * from tbltaikhoan where user='$user'");
			$rowKH=mysqli_fetch_array($resultKH);
			?>
			<div id="body">
			<form action="datHang.php" method="post"> 
			<table style="width:50%;margin:auto" class="table table-hover">
				<caption>Hóa đơn<div style="float:right"><a href="xemGioHang.php" class="btn btn-dark" style="background-color:rgba(70,70,70,1.00);color: white">Back</a></div></caption>
				<tr>
					<td width="20%">Tên khách hàng</td>
					<td width="20%" ><?php echo $rowKH["ten"];?></td>
				</tr>
				<tr>
					<td>Số điện thoại liên lạc</td>
					<td><input type="text" class="form-control" value="<?php echo $rowKH["sdt"];?>" name="sdt"></td>
				</tr>
				<tr>
					<td>Địa chỉ nhận hàng</td>
					<td><input type="text" class="form-control" value="<?php echo $rowKH["diachi"];?>" name="diachi"></td>
				</tr>
				<tr>
					<td>Yêu cầu</td>
					<td><textarea style="width:500px;height: 100%" class="form-control" placeholder="Yêu cầu của khách hàng" maxlength="150" name="yeucau"></textarea></td>
				</tr>
			</table>
		   <table cellspacing="0" align="center" class="table table-hover" style="width: 60%">
			<thead style="background-color: rgba(165,165,165,1.00)">
			<tr>
				<th>Ảnh sản phẩm</th>
				<th>Mã sản phẩm</th>
				<th>Tên sản phẩm</th>
				<th>Giá</th>
				<th>Số lượng</th>
				<th>Thành tiền</th>
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
				$thanhtoan=$_POST['tongtien'];
				?>
				<tr>
					<td><img src="<?php echo($row["anh"]);?>" height="70px" /></td>
					<td><?php echo($row["masp"]);?></td>            
					<td><?php echo($row["tensp"]);?></td>
					<td><?php echo(number_format($row["gia"],0,",","."));?></td>
					<td><?php echo($soLuong);?></td>
					<td><?php echo(number_format($thanhTien,0,",","."));?></td>
				</tr>
				<?php
				include("ConnectDb/close.php");
			}	
			?>
			   <tfoot>
					<tr>
						<td colspan="7"><p style="font-weight:bold;color:black" align="right">Tổng tiền: <?php echo (number_format($tongTien,0,",","."));?> VNĐ</p></td></form>
					</tr>  
					<tr>
						<td colspan="7"><p align="left" style="float:left;color:darkgrey">*Giảm giá 10% cho các hóa đơn trên 100.000.000 VNĐ</p><p style="font-weight:bold;color:black;font-size:1em;float:right" align="right">Giảm giá: <?php echo $_POST['giamgia'];?></p>
					</tr> 
					<tr>
						<td colspan="7"><p style="font-weight:bold;color:black;font-size:1.5em;" align="right">Thành tiền: <?php echo (number_format($_POST['tongtien'],0,",","."));?> VNĐ</p>
					</tr> 
					<tr>
					
						<td colspan="7" align="right">
						<button class="btn btn-primary" type="submit" style="color: white;background-color: rgba(57,57,57,1.00);font-weight: bold">Đặt hàng</button>
						</td>
					
					</tr>
				</tfoot>
			</table>
		</form>
		</div>
			<?php
			include("main/footer.php");
		}	
	}
	else
	{
		header("Location: index.php");
	}
	?>
</body>
</html>