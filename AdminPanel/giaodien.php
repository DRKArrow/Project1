<?php
	session_start();
	if(!isset($_SESSION["user"]) || ($_SESSION["mapq"]==3) )
	{
		header("Location: ../index.php");
	}
?>
<!doctype html>	
<html>
<head>
<meta charset="utf-8">
<title>Admin Panel</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
<script src="../jquerydatatable.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript">
		function notifyxoasanpham() {
			$.notify("Bạn đã xóa sản phẩm thành công !", "success");
		}
		function notifythemsanpham() {
			$.notify("Bạn đã thêm sản phẩm thành công !", "success");
		}
		function notifysuasanpham() {
			$.notify("Bạn đã sửa sản phẩm thành công !", "success");
		}
		function notifythemnsx() {
			$.notify("Bạn đã thêm nhà sản xuất thành công !", "success");
		}
		function notifyxoansx() {
			$.notify("Bạn đã xóa nhà sản xuất thành công !", "success");
		}
		function notifysuansx() {
			$.notify("Bạn đã sửa nhà sản xuất thành công !", "success");
		}
		function notifythemkh() {
			$.notify("Bạn đã thêm khách hàng thành công !", "success");
		}
		function notifyxoakh() {
			$.notify("Bạn đã xóa khách hàng thành công !", "success");
		}
		function notifythemad() {
			$.notify("Bạn đã thêm admin thành công !", "success");
		}
		function notifyxoaad() {
			$.notify("Bạn đã xóa admin thành công !", "success");
		}
		function notifydoimk() {
			$.notify("Bạn đã đổi mật khẩu thành công !", "success");
		}
		function notifyerrmk() {
			$.notify("Sai mật khẩu !", "error");
		}
		function notifythemdm() {
			$.notify("Bạn đã thêm danh mục thành công !", "success");
		}
		function notifyxoadm() {
			$.notify("Bạn đã xóa danh mục thành công !", "success");
		}
		function notifysuadm() {
			$.notify("Bạn đã sửa danh mục thành công !", "success");
		}
		function notifysuadh() {
			$.notify("Bạn đã sửa hóa đơn thành công !", "success");
		}
		function notifyxoadh() {
			$.notify("Bạn đã xóa hóa đơn thành công !", "success");
		}
		function notifyerrthemsp() {
			$.notify("Tên sản phẩm đã tồn tại !", "error");
		}
		function notifyerrthemmansx() {
			$.notify("Mã nhà sản xuất đã tồn tại !", "error");
		}
		function notifyerrthemtennsx() {
			$.notify("Tên nhà sản xuất đã tồn tại !", "error");
		}
		function notifyerrthemmadm() {
			$.notify("Mã danh mục đã tồn tại !", "error");
		}
		function notifyerrthemtendm() {
			$.notify("Tên danh mục đã tồn tại !", "error");
		}
		function notifyerrxoasp() {
			$.notify("Sản phẩm đang được bày bán, không thể xóa !", "warning");
		}	
		function notifyerrxoansx() {
			$.notify("Nhà sản xuất này không thể xóa !", "warning");
		}	
		function notifyerrxoadm() {
			$.notify("Danh mục này không thể xóa !", "warning");
		}	
		function notifyerrthemtk() {
			$.notify("Tên đăng nhập đã tồn tại !", "error");
		}	
		
</script>
	<style>
		.top{height: 5%;width: 100%;position: fixed;top:0;left:0;z-index: 1}
		.sidenav {height: 95%;width: 15%;min-width:200px;position: fixed;background-color: #111;left: 0;margin-top:52px;float: left;z-index: 1}
		.sidenav a {;font-size: 18px;color: #818181;display: block;}
		.sidenav a:hover {color: black;text-decoration: none}
		.main{width: 85%;height: 100vh ;float: right;margin-top: 52px}
		
	</style>
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body 
	
	 <?php
	if(isset($_GET["page"]) && isset($_GET["success"]))
	{
		if($_GET["page"]==2 && $_GET["success"]==1)
			{
				?>
					onLoad="notifyxoasanpham()"
				<?php
			}
		if($_GET["page"]==2 && $_GET["success"]==2)
			{
				?>
					onLoad="notifythemsanpham()"
				<?php
			}
		if($_GET["page"]==2 && $_GET["success"]==3)
			{
				?>
					onLoad="notifysuasanpham()"
				<?php
			}
		if($_GET["page"]==1 && $_GET["success"]==1)
			{
				?>
					onLoad="notifythemnsx()"
				<?php
			}
		if($_GET["page"]==1 && $_GET["success"]==2)
			{
				?>
					onLoad="notifyxoansx()"
				<?php
			}
		if($_GET["page"]==1 && $_GET["success"]==3)
			{
				?>
					onLoad="notifysuansx()"
				<?php
			}
		if($_GET["page"]==3 && $_GET["success"]==1)
			{
				?>
                	onLoad="notifythemkh()"
				<?php
			}
		if($_GET["page"]==3 && $_GET["success"]==2)
			{
				?>
					onLoad="notifyxoakh()"
				<?php
			}
		if($_GET["page"]==4 && $_GET["success"]==1)
			{
				?>
					onLoad="notifythemad()"
				<?php
			}
		if($_GET["page"]==4 && $_GET["success"]==2)
			{
				?>
                	onLoad="notifyxoaad()"
				<?php
			}
		if($_GET["page"]==6 && $_GET["success"]==1)
			{
				?>
                	onLoad="notifythemdm()"
				<?php
			}
		if($_GET["page"]==6 && $_GET["success"]==2)
			{
				?>
                	onLoad="notifyxoadm()"
				<?php
			}
		if($_GET["page"]==6 && $_GET["success"]==3)
			{
				?>
                	onLoad="notifysuadm()"
				<?php
			}
		if($_GET["page"]==5 && $_GET["success"]==1)
			{
				?>
                	onLoad="notifysuadh()"
				<?php
			}
		if($_GET["page"]==5 && $_GET["success"]==2)
			{
				?>
                	onLoad="notifyxoadh()"
				<?php
			}
			
	}
	if(isset($_GET['success']))
	{
		if($_GET['success']=='changepass')
		{
			?>
	  	onLoad="notifydoimk()"
	  <?php
		}
	}
	if (isset($_GET['err']))  
	{
		if($_GET['err']=='errchangepass')
			{
				?>
		  onLoad="notifyerrmk()"
		  <?php
			}
		if($_GET["page"]==2 && $_GET["err"]==1)
			{
				?>
					onLoad="notifyerrthemsp()"
				<?php
			}
		if($_GET["page"]==2 && $_GET["err"]==2)
			{
				?>
					onLoad="notifyerrxoasp()"
				<?php
			}
		if($_GET["page"]==1 && $_GET["err"]=='ma')
			{
				?>
					onLoad="notifyerrthemmansx()"
				<?php
			}	
		if($_GET["page"]==1 && $_GET["err"]=='1')
			{
				?>
					onLoad="notifyerrxoansx()"
				<?php
			}	
		if($_GET["page"]==1 && $_GET["err"]=='ten')
			{
				?>
					onLoad="notifyerrthemtennsx()"
				<?php
			}	
		if($_GET["page"]==6 && $_GET["err"]=='ma')
			{
				?>
					onLoad="notifyerrthemmadm()"
				<?php
			}	
		if($_GET["page"]==6 && $_GET["err"]=='ten')
			{
				?>
					onLoad="notifyerrthemtendm()"
				<?php
			}	
		if($_GET["page"]==6 && $_GET["err"]=='1')
			{
				?>
					onLoad="notifyerrxoadm()"
				<?php
			}
		if($_GET["page"]==3 && $_GET["err"]=='1')
			{
				?>
					onLoad="notifyerrthemtk()"
				<?php
			}		
		if($_GET["page"]==4 && $_GET["err"]=='1')
			{
				?>
					onLoad="notifyerrthemtk()"
				<?php
			}		
	}
	?>>
		<div class="top">
			<div class="top-nav">
				<nav class="navbar navbar-default">
				  <div class="container-fluid">
					<div class="navbar-header">
					  <a class="navbar-brand" href="giaodien.php">Admin panel</a>
					</div>
					<ul class="nav navbar-nav" style="fon">
					 	<li><a href="../index.php">
							<span class="glyphicon glyphicon-home"></span> Trang chủ</a>
        				</li>
                        <li><a href="giaodien.php"><span class="glyphicon glyphicon-stats"></span> Thống kê</a>
							
        				</li>

					</ul>
					 <div class="admin" style="float: right">
						<div class="dropdown" style="margin-top: 7px;margin-right: 5px">
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background-color:rgba(173,173,173,1.00)">
							Xin chào <?php 
							$user=$_SESSION["user"];
							include ("../ConnectDb/open.php");
							$sql="select ten from tbltaikhoan where user='$user'";
							$result=mysqli_query($con,$sql);
							$row=mysqli_fetch_array($result);
							
							echo $row["ten"];
							include ("../ConnectDb/close.php");
							?>
							<span class="caret"></span>
							</button>
									<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
										<li><a href="../logout.php" >Đăng xuất</a></li>
										<li>
										<a href="#" data-toggle="modal" data-target="#myModalNorm">
											Đổi mật khẩu
										</a>
										</li>
									</ul>
						</div>
					</div>
				  </div>
				</nav>			
			</div>	
		</div>
		<!-- Modal -->
<div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true" style="color: darkgrey">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Đóng</span>
                </button>
                <h4 class="modal-title" id="myModalLabel" align="left">
                    Đổi mật khẩu
                </h4>
            </div>
            
            <!-- Modal Body -->
			<form role="form" method="post" action="../changepassprocess.php" id="frmchangepass">
				<div class="modal-body">
                  <div class="form-group">
                    <label for="cp">Mật khẩu hiện tại</label>
                      <input type="password" class="form-control"
                      name="txtPass"/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu mới</label>
                      <input type="password" class="form-control"
                          name="txtNewPass" id="pass1"/>
                  </div>
					<div class="form-group">
                    <label for="exampleInputPassword1">Nhập lại mật khẩu</label>
                      <input type="password" class="form-control" name="password"
                      	/>
                  </div>

            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Đóng
                </button>
                <button type="submit" class="btn btn-primary" >
                    Đổi mật khẩu
                </button>
            </div>
				</form>
				<script type="text/javascript">
													
													
												$(document).ready(function() {

													jQuery.validator.addMethod("noSpace", function(value, element) { 
													  return value.indexOf(" ") < 0 && value != ""; 
													});
													//Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
													$("#frmchangepass").validate({
																rules: {
																	txtPass: "required",
																	txtNewPass: {
																		required: true,
																		noSpace: true,
																		minlength: 5
																	},
																	password: {
																		required: true,
																		equalTo: "#pass1"
																	},
																},
																messages: {
																	txtPass: "Không được để trống !",
																	txtNewPass: {
																		required: "Không được để trống !",
																		noSpace: "Không được nhập khoảng trắng !",
																		minlength: "Mật khẩu bạn nhập quá ngắn !"
																	},
																	password: {
																		required: "Không được để trống !",
																		equalTo: "Mật khẩu không khớp !"
																	},
																}
															});
												});
												</script>
        </div>
    </div>
</div>
		<div class="content">
			<div class="sidenav" style="background-color:LightGray ">
			<div class="panel-group" id="accordion" style="padding-top: 5px">
				<div class="panel panel-default" >
				  <div class="panel-heading" style="0">
					<h4 class="panel-title">
					  <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Quản lý hàng hóa</a>
					</h4>
				  </div>
				  <div id="collapse1" class="panel-collapse collapse in">
					<div class="panel-body">
						<a href="?page=1">Quản lý nhà sản xuất</a>
						<a href="?page=6">Quản lý danh mục</a>
						<a href="?page=2">Quản lý sản phẩm</a>
					</div>
				  </div>
				</div>
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h4 class="panel-title">
					  <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Quản lý tài khoản</a>
					</h4>
				  </div>
				  <div id="collapse2" class="panel-collapse collapse in">
					<div class="panel-body">
						<a href="?page=3">Tài khoản khách hàng</a>
						<?php
						if($_SESSION["mapq"]==1)
						{
						?>
						<a href="?page=4">Tài khoản admin</a>
						<?php
						}
						?>
					</div>
				  </div>
				</div>
				<div class="panel panel-default" >
				  <div class="panel-heading" style="0">
					<h4 class="panel-title">
					  <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Quản lý đơn hàng</a>
					</h4>
				  </div>
				  <div id="collapse3" class="panel-collapse collapse in">
					<div class="panel-body">
						<a href="?page=5">Hóa đơn</a>
					</div>
				  </div>
				</div>
			   </div>
			</div>
			<div class="main">
				<?php
				if(isset($_GET["page"]))
				{
					include ("../ConnectDb/open.php");
					if($_GET["page"] == 1)
					{
						include ("quanLySanPham/quanLyNsx/quanLynsx.php");
					}
					else if($_GET["page"] == 11)
					{
						include ("quanLySanPham/quanLyNsx/suansx.php");
					}
					else if($_GET["page"]==2)
					{
						include ("quanLySanPham/quanLySanPham/quanLySanPham.php");
					}
					else if($_GET["page"]==6)
					{
						include ("quanLyDanhMuc/quanLyDanhMuc.php");
					}
					else if($_GET["page"]==61)
					{
						include ("quanLyDanhMuc/suaDanhMuc.php");
					}
					else if($_GET["page"]==21)
					{
						include ("quanLySanPham/quanLySanPham/suaSanPham.php");
					}
					else if($_GET["page"]==22)
					{
						include ("quanLySanPham/quanLySanPham/suaSanPhamProcess.php");
					}
					else if($_GET["page"]==3)
					{
						include ("quanLyTaiKhoan/quanLyKhachHang.php");
					}
					else if($_GET["page"]==31)
					{
						include ("quanLyTaiKhoan/themTK.php");
					}
					else if($_GET["page"]==4)
					{
						include ("quanLyTaiKhoan/quanLyAdmin.php");
					}
					else if($_GET["page"]==5)
					{
						include ("quanLyDonHang/quanLyDonHang.php");
					}
					else if($_GET["page"]==51)
					{
						include ("quanLyDonHang/DonHangChiTiet.php");
					}
					else if($_GET["page"]==52)
					{
						include ("quanLyDonHang/suaDonHang.php");
					}
					include ("../ConnectDb/close.php");
				}
			else
			{
				include("thongke.php");
			}
				?>
			</div>
	</div>
</body>
</html>
