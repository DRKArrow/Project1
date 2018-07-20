<?php
	if(!isset($_GET["page"]))
	{
		header("Location:../../giaodien.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form method="post" action="quanLySanPham/quanLySanPham/processthemsanpham.php" enctype="multipart/form-data" class="form">
	<table class="table table-hover" style="width: 60%">
		<tr>
			<td>Loại sản phẩm</td>
			<td>
				<select name="ddlDM" class="form-control">
				<?php
					include ("../../ConnectDb/open.php");
					$resultdm=mysqli_query($con,"select * from tbldanhmuc");
					while($rowdm=mysqli_fetch_array($resultdm))
					{
						?>
						<option value="<?php echo $rowdm["madm"]; ?>"><?php echo $rowdm["loai"]; ?></option>
						<?php
					}				
				?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tên sản phẩm</td>
			<td><input type="text" name="txtTensp" class="form-control"/></td>
		</tr>
		<tr>
			<td>Giá</td>
			<td><input type="text" name="txtGia" class="form-control"/></td>
		</tr>
		<tr>
			<td>Tình trạng</td>
			<td>
			<select name="ddlTT" class="form-control">
				<option value="1">Còn hàng</option>
				<option value="2">Hết hàng</option>
			</select>
			</td>
		</tr>
		<tr>
			<td>Mô tả</td>
			<td><input type="text" name="txtMota" class="form-control"/></td>
		</tr>
		<tr>
			<td>Mô tả chi tiết</td>
			<td><textarea name="txtMotachitiet" class="form-control"></textarea></td>
		</tr>
		<tr>
			<td>Nhà sản xuất</td>
			<td>
			<select name="ddlNsx" class="form-control">
				<?php 
				$result=mysqli_query($con,"select * from tblnsx");
				while($row=mysqli_fetch_array($result))
				{
					?>
					<option value="<?php echo $row["mansx"]; ?>"><?php echo $row["tennsx"]; ?></option>
					<?php
				}				
				include ("../../ConnectDb/close.php");
				?>
			</select>
			</td>
		</tr>
		<tr>
			<td>Ảnh sản phẩm</td>
			<td><input type="file" name="file" class="btn"/></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" value="Thêm sản phẩm" class="btn"/></td>
		</tr>
	</table>
</form>
</body>
</html>
