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
<title>Untitled Document</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<script src="../../../jquery-1.12.4.js"></script>
	<script>
		$(document).ready(function() {
    $('#example').DataTable();
} );
	</script>
    <style>
	.imgaction{height:30px}
	</style>
</head>

<body>
	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="background-color: rgba(65,65,65,1.00)">Thêm admin</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thêm admin</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="quanLyTaiKhoan/themTK.php?mapq=2" class="" id="frmsignup">
		<div class="form-group" style="">
	Tên người dùng<input type="text" name="txtTen" class="form-control" required/><br>
	Tên đăng nhập<input type="text" name="txtUser" class="form-control" required/><br>
	Mật khẩu<input type="password" name="txtPass" class="form-control" required/><br>
	Email<input type="text" name="txtEmail" class="form-control" required/><br>
	Ngày sinh<input type="date" name="date" class="form-control" required/><br>
	Giới tính: 
	<label class="radio-inline"><input type="radio" name="rdbGt" value="1">Nam</label>
	<label class="radio-inline"><input type="radio" name="rdbGt" value="0">Nữ</label><br />
	Địa chỉ<input type="text" name="txtDiachi" class="form-control"  required/><br>
	Số điện thoại<input type="text" name="txtSdt" class="form-control" required/><br>
	<input type="submit" value="Thêm" class="btn">
		</div>
	</form>
     <!-- Validate SCRIPT-->
		<script type="text/javascript">
            
            
        $(document).ready(function() {

            jQuery.validator.addMethod("noSpace", function(value, element) { 
              return value.indexOf(" ") < 0 && value != ""; 
            });
            //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
            $("#frmsignup").validate({
                        rules: {
                            txtTen: "required",
                            txtUser:{
                                required: true,
                                noSpace: true
                            },
                            txtPass: {
                                required: true,
                                noSpace: true,
                                minlength: 5
                            },
                            txtSdt: {
                                required: true,
                                noSpace: true,
                                minlength: 9,
                                maxlength: 11,
                                digits: true
                            },
                            txtEmail: {
                                required: true,
                                noSpace: true,
                                email: true
                            },
                            date: "required",
                            txtDiachi: {
                                required: true,
                            },
							rdbGt: "required"
                        },
                        messages: {
                            txtTen: "Vui lòng nhập tên",
                            txtUser: {
                                required:  "Vui lòng nhập user",
                                noSpace: "Không chấp nhận khoảng trắng"
                            },
                            txtDiachi: {
                                required: "Vui lòng nhập địa chỉ",
                            },
                            txtSdt: {
                                required: "Vui lòng nhập số điện thoại",
                                digits: "Vui lòng nhập số",
                                noSpace: "Không chấp nhận khoảng trắng",
                                minlength: "Số máy quý khách vừa nhập là số không có thực",
                                maxlength: "Số máy quý khách vừa nhập là số không có thực"
                            },
                            txtPass: {
                                required: 'Vui lòng nhập mật khẩu',
                                noSpace: "Không chấp nhận khoảng trắng",
                                minlength: 'Vui lòng nhập ít nhất 5 kí tự'
                            },
                            txtEmail: {
                                required: "Vui lòng nhập Email",
                                noSpace: "Không chấp nhận khoảng trắng",
                                email: "Vui lòng nhập đúng định dạng Email"
                            },
                            date: {
                                required: "Vui lòng điền ngày sinh"
                            },
							rdbGt: "Vui lòng chọn giới tính",
                        }
                    });
        });
        </script>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        </div>
      </div>
      
    </div>
  </div>
<?php
	$result=mysqli_query($con,"select matk,user,ten from tbltaikhoan where mapq=2");
	if(mysqli_num_rows($result) > 0)
	{
?>
	<table cellspacing="0" align="center" class="table table-hover" id="example">
		<caption>Quản lý Admin</caption>
		<thead style="background-color: rgba(165,165,165,1.00)">
		<tr>
			<th>Mã tài khoản</th>
			<th>Tên đăng nhập</th>
			<th>Tên Admin</th>
			<th></th>
		</tr>
		</thead>
		<?php
			
			while($row=mysqli_fetch_array($result))
			{
			?>
			<tr>
				<td><?php echo $row["matk"]; ?></td>
				<td><?php echo $row["user"]; ?></td>
				<td><?php echo $row["ten"]; ?></td>
				<td><a href="quanLyTaiKhoan/xoaTK.php?maTK=<?php echo $row["matk"];?>&mapq=2" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><img src="../Images/giaodien/icons8-trash-can-50.png" class="imgaction"/></a></td>
			</tr>
			<?php
			}
		?>
	</table>
	<?php
	}
	else echo("Không có admin nào");
	?>
</body>
</html>
