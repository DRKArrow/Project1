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
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
<script src="jquerydatatable.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

<script>
		$(document).ready(function() {
    $('#example').DataTable();
} );
	</script>
<script type="text/javascript">
		function notify() {
			$.notify("Bạn đã sửa hóa đơn thành công !", "success");
		}
</script>
<style>
	#body{min-height: 70vh;width:80%;margin:auto;margin-top:10px;}
	.ahistory{color:black}
	#footer{background:rgba(14,14,14,1.00)}
	.afooter{color:darkgrey}
	.pfooter{color: darkgray}
	.h3footer{color: white}
	.imgaction{height:30px}
</style>
<title>Lịch sử giao dịch</title>
</head>

<body <?php
	  if(isset($_GET['success']))
	  {
		  ?>
	  	onLoad="notify()"
	  	<?php
	  }
	  ?>>
	<?php 
	$activepage="";
	$user=$_SESSION["user"];
		include ("main/header.php");
		include("ConnectDb/open.php");		
		$result=mysqli_query($con,"select tblhoadon.mahd,tblhoadon.ngaydathang,tblhoadon.tinhtrang from tblhoadon inner join tbltaikhoan on tblhoadon.matk=tbltaikhoan.matk where user='$user' order by ngaydathang desc");
		if(isset($_POST['result']))
		{
			if($_POST['result']=='dangxuly')
			{
				$result=mysqli_query($con,"select tblhoadon.mahd,tblhoadon.ngaydathang,tblhoadon.tinhtrang from tblhoadon inner join tbltaikhoan on tblhoadon.matk=tbltaikhoan.matk where user='$user' and tblhoadon.tinhtrang=1 order by ngaydathang desc");
			}
			if($_POST['result']=='danggiaohang')
			{
				$result=mysqli_query($con,"select tblhoadon.mahd,tblhoadon.ngaydathang,tblhoadon.tinhtrang from tblhoadon inner join tbltaikhoan on tblhoadon.matk=tbltaikhoan.matk where user='$user' and tblhoadon.tinhtrang=2 order by ngaydathang desc");
			}
			if($_POST['result']=='dagiaohang')
			{
				$result=mysqli_query($con,"select tblhoadon.mahd,tblhoadon.ngaydathang,tblhoadon.tinhtrang from tblhoadon inner join tbltaikhoan on tblhoadon.matk=tbltaikhoan.matk where user='$user' and tblhoadon.tinhtrang=3 order by ngaydathang desc");
			}
			if($_POST['result']=='huydonhang')
			{
				$result=mysqli_query($con,"select tblhoadon.mahd,tblhoadon.ngaydathang,tblhoadon.tinhtrang from tblhoadon inner join tbltaikhoan on tblhoadon.matk=tbltaikhoan.matk where user='$user' and tblhoadon.tinhtrang=4 order by ngaydathang desc");
			}
		}
		if(mysqli_num_rows($result)!=0)
		{
	?>
	<div id="body">
    <div class="form-group" style="width:10%">
        <label for="sel1">Lọc theo tình trạng</label>
        <form method="post">
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
	   <caption>Hóa đơn<?php if(isset($_GET['result']) || isset($_POST['result'])){ ?><div style="float:right"><a href="lichSuGiaoDich.php" style="color:blue">Xóa bộ lọc</a></div><?php }?></caption>
		<thead style="background-color: rgba(165,165,165,1.00)">
		<tr>
			<th>Mã hóa đơn</th>
			<th>Ngày đặt hàng</th>
			<th>Tình trạng</th>
			<th></th>
			<th>Thao tác</th>
		</tr>
		</thead>
        
		<?php			
			while($row=mysqli_fetch_array($result))
			{
			?>
            <tr>
				<td><?php echo($row["mahd"]);?></td>       
                <td><?php echo($row["ngaydathang"]);?></td>
				<td><?php if($row['tinhtrang']==1) { echo "Đang xử lý"; } if($row['tinhtrang']==2) { echo "Đang giao hàng"; } if($row['tinhtrang']==3) { echo "Đã giao hàng"; } if($row['tinhtrang']==4) { echo "Hủy đơn hàng"; }?></td>
				<td><a href="hoaDonChiTiet.php?mahd=<?php echo($row["mahd"]);?>" class="ahistory"><button class="btn">Xem chi tiết</button></a></td>
				<td>
					<?php if($row["tinhtrang"]==1) { ?> <a href="suaDonHang.php?mahd=<?php echo($row["mahd"]);?>" class="btn btn-dark btn-lg"><span class="glyphicon glyphicon-edit"></span></a>
				| 
                <a href="huyDonHang.php?mahd=<?php echo($row["mahd"]);?>" class="btn btn-dark btn-lg" onClick="return confirm('Bạn có chắc muốn hủy đơn hàng số <?php echo $row['mahd']; ?>')"><span class="glyphicon glyphicon-trash"></span></a><?php 				}
					else
					{
						?>
				<a class="btn btn-dark btn-lg"><span class="glyphicon glyphicon-edit"></span></a> | <a class="btn btn-dark btn-lg"><span class="glyphicon glyphicon-trash"></span></a>
				<?php
					}
				?>
                </td> 
            </tr>
            <?php
			}
			include("ConnectDb/close.php");
		?>
        </table>
	</div>
	<?php
		}
		else
		{
			if(isset($_POST['result']))
			{
				?>
                <div id="body">
                <div class="form-group" style="width:10%">
        <label for="sel1">Lọc theo tình trạng</label>
        <form method="post">
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
	   <caption>Hóa đơn<?php if(isset($_GET['result']) || isset($_POST['result'])){ ?><div style="float:right"><a href="lichSuGiaoDich.php" style="color:blue">Xóa bộ lọc</a></div><?php }?></caption>
		<thead style="background-color: rgba(165,165,165,1.00)">
		<tr>
			<th>Mã hóa đơn</th>
			<th>Ngày đặt hàng</th>
			<th>Tình trạng</th>
			<th></th>
			<th>Thao tác</th>
		</tr>
		</thead>
        
		<?php			
			while($row=mysqli_fetch_array($result))
			{
			?>
            <tr>
				<td><?php echo($row["mahd"]);?></td>       
                <td><?php echo($row["ngaydathang"]);?></td>
				<td><?php echo($row["tinhtrang"]);?></td>
				<td><a href="hoaDonChiTiet.php?mahd=<?php echo($row["mahd"]);?>" class="ahistory"><button class="btn">Xem chi tiết</button></a></td>
				<td>
					<?php if($row["tinhtrang"]==1) { ?> <a class="btn btn-dark btn-lg" href="suaDonHang.php?mahd=<?php echo($row["mahd"]);?>" ><span class="glyphicon glyphicon-edit"></span></a>
				| 
                <a class="btn btn-dark btn-lg" href="huyDonHang.php?mahd=<?php echo($row["mahd"]);?>" onClick="return confirm('Bạn có chắc muốn hủy đơn hàng số <?php echo $row['mahd']; ?>')"><span class="glyphicon glyphicon-trash"></span></a><?php 				}
					else
					{
						?>
				<a class="btn btn-dark btn-lg"><span class="glyphicon glyphicon-edit"></span></a> | <aclass="btn btn-dark btn-lg"><span class="glyphicon glyphicon-trash"></span></a>
				<?php
					}
				?>
            </tr>
            <?php
			}
			include("ConnectDb/close.php");
		?>
        </table>
        </div>
                <?php
			}
			else
			{
			?>
			<meta http-equiv="Refresh" content="0,index.php?history=none">
			<?php
			}
		}	?>
	<div id="footer" align="center">
		<div class="row" style="width:100%">
 			<div class="col-sm-4">
				<h3>Contact</h3>
				<a href="#" class="afooter">Facebook</a><br>

				<a href="#" class="afooter">Instagram</a>
				<p class="pfooter">0934655469</p>
			</div>
 			<div class="col-sm-4">
				<h3>About Us</h3>
				<a href="#" class="afooter">About Us</a>
			</div>
			<div class="col-sm-3">
				<h3 class="h3footer">Address</h3>
				
			</div>
		</div>
	</div>
</body>
</html>
