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
<style>
	#body{margin-top:10px}
	.imgaction{height:30px}
</style>
<title>Untitled Document</title>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
    $('#example').DataTable();
} );
	</script>
</head>

<body>
	<?php 	
		$result=mysqli_query($con,"select mahd,ngaydathang,tinhtrang,tbltaikhoan.ten from tblhoadon inner join tbltaikhoan on tblhoadon.matk=tbltaikhoan.matk order by ngaydathang desc");
		if(isset($_GET['result']))
		{
			if($_GET['result']=='dangxuly')
			{
				$result=mysqli_query($con,"select mahd,ngaydathang,tinhtrang,tbltaikhoan.ten from tblhoadon inner join tbltaikhoan on tblhoadon.matk=tbltaikhoan.matk where tinhtrang=1 order by ngaydathang desc");
			}
			if($_GET['result']=='danggiaohang')
			{
				$result=mysqli_query($con,"select mahd,ngaydathang,tinhtrang,tbltaikhoan.ten from tblhoadon inner join tbltaikhoan on tblhoadon.matk=tbltaikhoan.matk where tinhtrang=2 order by ngaydathang desc");
			}
			if($_GET['result']=='dagiaohang')
			{
				$result=mysqli_query($con,"select mahd,ngaydathang,tinhtrang,tbltaikhoan.ten from tblhoadon inner join tbltaikhoan on tblhoadon.matk=tbltaikhoan.matk where tinhtrang=3 order by ngaydathang desc");
			}
			if($_GET['result']=='huydonhang')
			{
				$result=mysqli_query($con,"select mahd,ngaydathang,tinhtrang,tbltaikhoan.ten from tblhoadon inner join tbltaikhoan on tblhoadon.matk=tbltaikhoan.matk where tinhtrang=4 order by ngaydathang desc");
			}
		}
		if(isset($_POST['result']))
		{
			if($_POST['result']=='dangxuly')
			{
				$result=mysqli_query($con,"select mahd,ngaydathang,tinhtrang,tbltaikhoan.ten from tblhoadon inner join tbltaikhoan on tblhoadon.matk=tbltaikhoan.matk where tinhtrang=1 order by ngaydathang desc");
			}
			if($_POST['result']=='danggiaohang')
			{
				$result=mysqli_query($con,"select mahd,ngaydathang,tinhtrang,tbltaikhoan.ten from tblhoadon inner join tbltaikhoan on tblhoadon.matk=tbltaikhoan.matk where tinhtrang=2 order by ngaydathang desc");
			}
			if($_POST['result']=='dagiaohang')
			{
				$result=mysqli_query($con,"select mahd,ngaydathang,tinhtrang,tbltaikhoan.ten from tblhoadon inner join tbltaikhoan on tblhoadon.matk=tbltaikhoan.matk where tinhtrang=3 order by ngaydathang desc");
			}
			if($_POST['result']=='huydonhang')
			{
				$result=mysqli_query($con,"select mahd,ngaydathang,tinhtrang,tbltaikhoan.ten from tblhoadon inner join tbltaikhoan on tblhoadon.matk=tbltaikhoan.matk where tinhtrang=4 order by ngaydathang desc");
			}
		}
		if(mysqli_num_rows($result)!=0)
		{
	?>
	<div id="body">
    	<div class="form-group" style="width:10%">
        <label for="sel1">Lọc theo tình trạng</label>
        <form action="?page=5" method="post">
    <select class="form-control" id="sel1" name="result" onchange="this.form.submit()">
    	<option selected="selected">Chọn tình trạng</option>
        <option value="dangxuly" <?php if(isset($_POST['result'])) { if($_POST['result']=='dangxuly') { ?> selected="selected" <?php } } ?> <?php if(isset($_GET['result'])) { if($_GET['result']=='dangxuly') { ?> selected="selected" <?php } } ?>>Đang xử lý</option>
        <option value="danggiaohang" <?php if(isset($_POST['result'])) { if($_POST['result']=='danggiaohang') { ?> selected="selected" <?php } } ?> <?php if(isset($_GET['result'])) { if($_GET['result']=='danggiaohang') { ?> selected="selected" <?php } } ?>>Đang giao hàng</option>
        <option value="dagiaohang" <?php if(isset($_POST['result'])) { if($_POST['result']=='dagiaohang') { ?> selected="selected" <?php } } ?> <?php if(isset($_GET['result'])) { if($_GET['result']=='dagiaohang') { ?> selected="selected" <?php } } ?>>Đã giao hàng</option>
        <option value="huydonhang" <?php if(isset($_POST['result'])) { if($_POST['result']=='huydonhang') { ?> selected="selected" <?php } } ?> <?php if(isset($_GET['result'])) { if($_GET['result']=='huydonhang') { ?> selected="selected" <?php } } ?>>Hủy đơn hàng</option>
    </select>
    	</form>
    	</div>
       <table cellspacing="0" align="center" class="table table-hover" id="example">
       <caption>Quản lý hóa đơn<?php if(isset($_GET['result']) || isset($_POST['result'])){ ?><div style="float:right"><a href="?page=5">Xóa bộ lọc</a></div><?php }?></</caption>
		<thead style="background-color: rgba(165,165,165,1.00)">
		<tr>
			<th>Mã hóa đơn</th>
			<th>Tên khách hàng</th>
			<th>Ngày đặt hàng</th>
			<th>Tình trạng</th>
            <th>Thao tác</th>
			<th></th>
		</tr>
		</thead>
        
		<?php			
			while($row=mysqli_fetch_array($result))
			{
			?>
            <tr <?php if($row['tinhtrang']==4) {?> style="background: rgba(196,84,85,0.6);" <?php } if($row['tinhtrang']==2) {?> style="background: rgba(69,115,223,0.76);" <?php } if($row['tinhtrang']==3) {?> style="background: rgba(213,216,94,0.78);" <?php } ?>>
				<td><?php echo($row["mahd"]);?></td>       
				<td><?php echo($row["ten"]);?></td>
                <td><?php echo($row["ngaydathang"]);?></td>
				<td>
                <form method="post" action="quanLyDonHang/capNhatDonHang.php?mahd=<?php echo $row["mahd"];?>">
                    <select name="ddlTT" onchange="this.form.submit()" class="form-control">
                        <option value="1" <?php if ($row['tinhtrang']==1) { ?> selected="selected" <?php } ?>>Đang xử lý</option>
                        <option value="2" <?php if ($row['tinhtrang']==2) { ?> selected="selected" <?php } ?>>Đang giao hàng</option>
                        <option value="3" <?php if ($row['tinhtrang']==3) { ?> selected="selected" <?php } ?>>Đã giao hàng</option>
                        <option value="4" <?php if ($row['tinhtrang']==4) { ?> selected="selected" <?php } ?>>Hủy đơn hàng</option>
                    </select>
                </form>
				</td>
                <td><a href="?page=52&mahd=<?php echo($row['mahd']);?>"><img src="../Images/giaodien/icons8-settings-40.png" class="imgaction"/></a> | <a href="quanLyDonHang/xoaDonHang.php?mahd=<?php echo $row["mahd"];?>" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')"><img src="../Images/giaodien/icons8-trash-can-50.png" class="imgaction"/></a></td>
				<td><a href="?page=51&mahd=<?php echo($row["mahd"]);?>" style="color:black"><button class="btn">Xem chi tiết</button></a></td>
            </tr>
            <?php
			}
		?>
        </table>
	</div>
	<?php
		}
		else
		{
		?>
			<div id="body">
    	<div class="form-group" style="width:10%">
        <label for="sel1">Lọc theo tình trạng</label>
        <form action="?page=5" method="post">
    <select class="form-control" id="sel1" name="result" onchange="this.form.submit()">
    	<option selected="selected">Chọn tình trạng</option>
        <option value="dangxuly" <?php if(isset($_POST['result'])) { if($_POST['result']=='dangxuly') { ?> selected="selected" <?php } } ?> <?php if(isset($_GET['result'])) { if($_GET['result']=='dangxuly') { ?> selected="selected" <?php } } ?>>Đang xử lý</option>
        <option value="danggiaohang" <?php if(isset($_POST['result'])) { if($_POST['result']=='danggiaohang') { ?> selected="selected" <?php } } ?> <?php if(isset($_GET['result'])) { if($_GET['result']=='danggiaohang') { ?> selected="selected" <?php } } ?>>Đang giao hàng</option>
        <option value="dagiaohang" <?php if(isset($_POST['result'])) { if($_POST['result']=='dagiaohang') { ?> selected="selected" <?php } } ?> <?php if(isset($_GET['result'])) { if($_GET['result']=='dagiaohang') { ?> selected="selected" <?php } } ?>>Đã giao hàng</option>
        <option value="huydonhang" <?php if(isset($_POST['result'])) { if($_POST['result']=='huydonhang') { ?> selected="selected" <?php } } ?> <?php if(isset($_GET['result'])) { if($_GET['result']=='huydonhang') { ?> selected="selected" <?php } } ?>>Hủy đơn hàng</option>
    </select>
    	</form>
    	</div>
       <table cellspacing="0" align="center" class="table table-hover" id="example">
       <caption>Quản lý hóa đơn<?php if(isset($_GET['result']) || isset($_POST['result'])){ ?><div style="float:right"><a href="?page=5">Xóa bộ lọc</a></div><?php }?></</caption>
		<thead style="background-color: rgba(165,165,165,1.00)">
		<tr>
			<th>Mã hóa đơn</th>
			<th>Tên khách hàng</th>
			<th>Ngày đặt hàng</th>
			<th>Tình trạng</th>
            <th>Thao tác</th>
			<th></th>
		</tr>
		</thead>
        
		<?php			
			while($row=mysqli_fetch_array($result))
			{
			?>
            <tr>
				<td><?php echo($row["mahd"]);?></td>       
				<td><?php echo($row["ten"]);?></td>
                <td><?php echo($row["ngaydathang"]);?></td>
				<td>
                <form method="post" action="quanLyDonHang/capNhatDonHang.php?madh=<?php echo $row["madh"];?>">
                    <select name="ddlTT" onchange="this.form.submit()" class="form-control">
                        <option value="1" <?php if ($row['tinhtrang']==1) { ?> selected="selected" <?php } ?>>Đang xử lý</option>
                        <option value="2" <?php if ($row['tinhtrang']==2) { ?> selected="selected" <?php } ?>>Đang giao hàng</option>
                        <option value="3" <?php if ($row['tinhtrang']==3) { ?> selected="selected" <?php } ?>>Đã giao hàng</option>
                        <option value="4" <?php if ($row['tinhtrang']==4) { ?> selected="selected" <?php } ?>>Hủy đơn hàng</option>
                    </select>
                </form>
				</td>
                <td><a href="?page=52&mahd=<?php echo($row['mahd']);?>"><img src="../Images/giaodien/icons8-settings-40.png" class="imgaction"/></a> | <a href="quanLyDonHang/xoaDonHang.php?mahd=<?php echo $row["mahd"];?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><img src="../Images/giaodien/icons8-trash-can-50.png" class="imgaction"/></a></td>
				<td><a href="?page=51&mahd=<?php echo($row["mahd"]);?>" style="color:black"><button class="btn">Xem chi tiết</button></a></td>
            </tr>
            <?php
			}
		?>
        </table>
	</div>
	<?php	
		}
	?>
</body>
</html>
