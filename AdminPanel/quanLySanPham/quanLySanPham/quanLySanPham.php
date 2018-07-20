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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
    $('#example').DataTable();
} );
	</script>
    <style>
	.imgaction {height:30px}
	#img {height:40vh}

	</style>
</head>

<body>
	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="background-color: rgba(65,65,65,1.00)">Thêm sản phẩm</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thêm sản phẩm</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="quanLySanPham/quanLySanPham/processthemsanpham.php" enctype="multipart/form-data" class="form" id="frmthemsp">
	<table class="table table-hover" style="">
		<tr>
			<td width="20%">Loại sản phẩm</td>
			<td>
				<select name="ddlDM" class="form-control" required>
				<?php
					include ("../../ConnectDb/open.php");
					$resultdm=mysqli_query($con,"select * from tbldanhmuc");
					while($rowdm=mysqli_fetch_array($resultdm))
					{
						?>
						<option value="<?php echo $rowdm["madm"]; ?>"><?php echo $rowdm["tendanhmuc"]; ?></option>
						<?php
					}				
				?>
				</select>
			</td>
			<td rowspan="7" width="50%"><img id="img" src="#" alt="" /></td>
		</tr>
		<tr>
			<td>Tên sản phẩm</td>
			<td><input type="text" name="txtTensp" class="form-control" required/></td>
		</tr>
		<tr>
			<td>Giá</td>
			<td><input type="text" name="txtGia" class="form-control" required/></td>
		</tr>
		<tr>
			<td>Tình trạng</td>
			<td>
			<select name="ddlTT" class="form-control" required>
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
			<td>Nhà sản xuất</td>
			<td>
			<select name="ddlNsx" class="form-control" required>
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
			<td> <form id="form1" runat="server">
        <input type="file" name="file" class="btn" id="imgInp" required/>
  		  </form>
	<script>
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });
</script></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" value="Thêm sản phẩm" class="btn"/></td>
		</tr>
	</table>
</form>
 <!-- Validate SCRIPT-->
		<script type="text/javascript">
            
            
        $(document).ready(function() {

            jQuery.validator.addMethod("noSpace", function(value, element) { 
              return value.indexOf(" ") < 0 && value != ""; 
            });
            //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
            $("#frmthemsp").validate({
                        rules: {
							ddlDM: "required",
                            txtTensp: "required",
							ddlTT: "required",
                            txtGia: {
								required: true,
								noSpace: true,
								digits: true
							},
							ddlNsx: "required",
							file: "required"
                        },
                        messages: {
                            ddlDM: "Vui lòng chọn danh mục",
                            txtTensp: "Vui lòng nhập tên sản phẩm",
                            ddlTT: "Vui lòng chọn tình trạng",
                            txtGia: {
                                required: "Vui lòng nhập giá",
								noSpace: "Không chấp nhận khoảng trắng",
                                digits: "Vui lòng nhập số"                                
                            },
                            ddlNsx: "Vui lòng chọn nhà sản xuất",
                            file: "Vui lòng chọn ảnh sản phẩm",
                        }
                    });
        });
        </script>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
	
<?php
	$result=mysqli_query($con,"select * from tblsanpham inner join tblnsx on tblsanpham.mansx=tblnsx.mansx inner join tbldanhmuc on tblsanpham.madm=tbldanhmuc.madm");
	if(mysqli_num_rows($result) > 0)
	{
?>
<form method="get" action="quanLySanPham/quanLySanPham/suaSanPham.php">
	<table cellspacing="0" align="center" class="table table-hover" style="width: 100%" id="example">
    <caption>Quản lý sản phẩm</caption>
		<thead style="background-color: rgba(165,165,165,1.00)">
		<tr>
			<th>Ảnh sản phẩm</th>
			<th>Mã sản phẩm</th>
			<th width="30%">Tên sản phẩm</th>
			<th>Giá</th>
			<th>Tình trạng</th>
			<th>Nhà sản xuất</th>
			<th>Danh mục</th>
			<th>Thao tác</th>
		</tr>
		</thead>
		<?php
			
			while($row=mysqli_fetch_array($result))
			{
			?>
			<tr>
				<td><img src="../<?php echo $row["anh"];?>" width="70px"/></td>
				<td><?php echo $row["masp"]; ?></td>
				<td><?php echo $row["tensp"]; ?></td>
				<td><?php echo(number_format($row["gia"],0,",",".")); ?></td>
				<td><?php if($row["tinhtrang"]==1) { echo "Còn hàng"; } else { echo "Hết hàng"; } ?></td>
				<td><?php echo $row["tennsx"]; ?></td>
				<td><?php echo $row["tendanhmuc"];?></td>
				<td><a href="?page=21&masp=<?php echo $row["masp"];?>"><img src="../Images/giaodien/icons8-settings-40.png" class="imgaction"/></a> | <a href="quanLySanPham/quanLySanPham/xoaSanPham.php?masp=<?php echo $row["masp"];?>" onclick="return confirm('Bạn có chắc muốn xóa?')"><img src="../Images/giaodien/icons8-trash-can-50.png" class="imgaction"/></a></td>
				
			</tr>
			<?php
			}
		?>
	</table>
</form>
	<?php
	}
	else echo("<br>Không có sản phẩm nào");
	?>
</body>
</html>
