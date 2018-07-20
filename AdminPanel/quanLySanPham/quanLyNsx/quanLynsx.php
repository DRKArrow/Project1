<?php
	if(!isset($_SESSION["user"]) || ($_SESSION["mapq"]==3) )
	{
		header("Location: ../../../index.php");
	}
	if(!isset($_GET["page"]))
	{
		header("Location:../../giaodien.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<title>Untitled Document</title>
<style>
	td:hover{background:lightgrey;}
	.imgaction {height:30px}
</style>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<script src="../../../jquery-1.12.4.js"></script>
	<script>
		$(document).ready(function() {
    $('#example').DataTable();
} );
	</script>
</head>

<body>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="background-color: rgba(65,65,65,1.00)">Thêm nhà sản xuất</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thêm nhà sản xuất</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="quanLySanPham/quanLyNsx/processthemnsx.php" enctype="multipart/form-data" class="form">
	<table class="table table-hover" style="width: 60%">
		<tr>
			<td>Mã nhà sản xuất</td>
			<td><input type="text" name="txtMa" class="form-control" required/></td>
		</tr>
		<tr>
			<td>Tên nhà sản xuất</td>
			<td><input type="text" name="txtTen" class="form-control" required/></td>
		</tr>
		<tr>
			<td>Giới thiệu</td>
			<td><textarea name="txtGt" class="form-control" style="height:20vh;width:10vw;resize:none"></textarea></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" class="btn" value="Thêm nhà sản xuất"></td>
		</tr>
	</table>
</form>
</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>	
<?php
	$result=mysqli_query($con,"select * from tblnsx");
	if(mysqli_num_rows($result) > 0)
	{
?>
	<table cellspacing="0" align="center" class="table table-hover" id="example">
		<caption>Quản lý nhà sản xuất</caption>
		<thead style="background-color: rgba(188,188,188,1.00)">
		<tr>
			<th scope="col">Mã nhà sản xuất</th>
			<th scope="col">Tên nhà sản xuất</th>
			<th scope="col">Thao tác</th>
		</tr>
		</thead>
		<tbody>
		<?php
			
			while($row=mysqli_fetch_array($result))
			{
			?>
			<tr>
				<td><?php echo $row["mansx"]; ?></td>
				<td><?php echo $row["tennsx"]; ?></td>
				<td><a href="?page=11&mansx=<?php echo $row["mansx"];?>"><img src="../Images/giaodien/icons8-settings-40.png" class="imgaction"/></a> | <a href="quanLySanPham/quanLynsx/xoansx.php?mansx=<?php echo $row["mansx"];?>" onclick="return confirm('Bạn có chắc muốn xóa?')"><img src="../Images/giaodien/icons8-trash-can-50.png" class="imgaction"/></a></td>
			</tr>
			<?php
			}
		?>
		</tbody>
	</table>
	<?php
	}
	else echo("<br>Không có nhà sản xuất nào");
	?>
</body>
</html>
