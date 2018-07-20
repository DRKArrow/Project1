<?php
	if(!isset($activepage))
	{
		header("Location: ../index.php");
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dosis:300,400">
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


	<style>
		#header{width: 100%;height: 200px;background: rgba(0,0,0,1.00);}	
		#logo{width: auto;height: inherit}
		#navbar{margin-top: -130px;}
		a{color: darkgrey}
		.dropbtn {background-color:rgba(34,34,34,1.00);color: darkgray;padding: 16px;border: none;cursor: pointer;height:48px;font-weight:bold}
		.dropdown {position: relative;display: inline-block;}
		.dropdown-content {display: none;position: absolute;background-color: rgba(38,38,38,1.00);min-width: 500px;box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);z-index: 1;}
		.dropdown-content a {color: darkgray;padding: 12px 16px;text-decoration: none;display: block;}
		.dropdown-content a:hover {background-color:rgba(116,116,116,1.00)}
		.dropdown:hover 
		.dropdown-content{display: block;}
		.dropdown:hover 
		.dropbtn {background-color: rgba(72,72,72,1.00);}
		.maincate {color:white;font-weight: bold;font-family:"Courier New", Courier, monospace}
		.maincate:after,
		.maincate:before {
			content: '';
		  position: absolute;
		  left: 0;
		  display: inline-block;
		  height: 1em;
		  width: 100%;
		  opacity: 0;
			-webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
			transition: opacity 0.35s, transform 0.35s;
			
		}
		
		.maincate:before {
		  border-left: 1px solid;
		  border-right: 1px solid;
		  -webkit-transform: scale(1,0);
			transform: scale(1,0);
		}
		
		.maincate:after {
		  border-bottom: 1px solid;
		  border-top: 1px solid;
		  -webkit-transform: scale(0,1);
			transform: scale(0,1);
		}
		
		.maincate:hover:after,
		.maincate:hover:before {
		  opacity: 1;
			-webkit-transform: scale(1);
			transform: scale(1);
		}
		.adropdown {font-family: 'Dosis', sans-serif;font-size:0.9em;font-weight:bold}
		.adropdown:hover {
			text-decoration:none;
			color:white;
			font-weight:bolder;
			-webkit-mask-image: linear-gradient(-75deg, rgba(0,0,0,.6) 30%, #000 50%, rgba(0,0,0,.6) 70%);
  			-webkit-mask-size: 200%;
  			animation: shine 2s infinite;
		}
		.adropdown:hover:after {
 	 opacity: 1;
	-webkit-transform: scale(1);
	transform: scale(0.7);
	}
		.adropdown:after {
			content: '';
			  position: absolute;
			  left: 0;
			  display: inline-block;
			  height: 1em;
			  width: 100%;
			  border-bottom: 1px solid;
			  margin-top: 10px;
			  opacity: 0;
			-webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
			transition: opacity 0.35s, transform 0.35s;
			-webkit-transform: scale(0,1);
			transform: scale(0,1);
		}
	</style>
</head>

<body>
	<div id="header">
		<div id="giohang" align="right" style="margin-right:5px">
			<a href="xemGioHang.php" class="btn btn-md" role="button" style="background-color:rgba(57,57,57,1.00);color: darkgray"><span class="glyphicon glyphicon-shopping-cart"></span> Giỏ hàng (<?php if(isset($_SESSION['gioHang'])) {$count=count($_SESSION['gioHang']); echo $count;} else { echo '0';}?>)</a>
		</div>
		<div class="nav navbar-static-top" align="right">
        <?php
		if(!isset($_SESSION["user"]))
		{
			?>
			<div id="reg" style="float: right;margin-left: 20px;height:35px;color: aliceblue" >	
				<button class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="color: darkgray;background-color: rgba(57,57,57,1.00)">
    Đăng nhập/Đăng ký</button>
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
					aria-hidden="true" >
					<div class="modal-dialog modal-lg"  style="background-color: black;width: 700px;height: 300px" >
						<div class="modal-content"  style="background-color: black">
							<div class="modal-header"  style="background-color: black">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									×</button>
								<h4 class="modal-title" id="myModalLabel" style="color:darkgray;padding-right:30px">
									Đăng nhập/Đăng ký</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="c" style=";padding-right: 30px;">
										<!-- Nav tabs -->
										<ul class="nav nav-tabs">
											<li class="active"><a href="#Login" data-toggle="tab">Đăng nhập</a></li>
											<li><a href="#Registration" data-toggle="tab">Đăng ký</a></li>
										</ul>
										<!-- Tab panes -->
										<div class="tab-content">
											<div class="tab-pane active" id="Login">
												<form method="post" action="loginprocess.php" class="form-horizontal" style="padding-top: 10px">
												<div class="form-group">
													<label for="Username" class="col-sm-3 control-label">
														Tên đăng nhập</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="txtUser" placeholder="Tên đăng nhập" required/>
													</div>
												</div>
												<div class="form-group">
													<label for="Password" class="col-sm-3 control-label">
														Mật khẩu</label>
													<div class="col-sm-9">
														<input type="password" class="form-control" name="txtPass" placeholder="Mật khẩu" required />
													</div>
												</div>
												<div class="row">
													<div class="col-sm-2">
													</div>
													<div class="col-sm-10">
														<button type="submit" class="btn btn-primary btn-sm" style="color:white ;background-color: rgba(31,31,31,1.00)">
															Đăng nhập</button>
													</div>
												</div>
												</form>
											</div>
											<div class="tab-pane" id="Registration">
												<form method="post" action="signupprocess.php" class="form-horizontal" style="padding-top: 10px" id="frmsignup">
												<div class="form-group">
													<label for="email" class="col-sm-3 control-label">
														Tên người dùng</label>
													<div class="col-sm-9">
														<div class="row">
															<div class="col-md-3">
																<select class="form-control" name="ddlGt">
																	<option value="1">Ông</option>
																	<option value="0">Bà</option>
																</select>
															</div>
															<div class="col-md-9">
																<input type="text" class="form-control" name="txtTen" placeholder="Tên người dùng" required/>
															</div>
														</div>
													</div>
													
												</div>
												<div class="form-group">
													<label for="email" class="col-sm-3 control-label">
														Tên đăng nhập</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="txtUser" placeholder="Tên đăng nhập" required />
													</div>
												</div>
												<div class="form-group">
													<label for="password" class="col-sm-3 control-label">
														Mật khẩu</label>
													<div class="col-sm-9">
														<input type="password" class="form-control" name="txtPass" placeholder="Mật khẩu" required/>
													</div>
												</div>
												<div class="form-group">
													<label for="mobile" class="col-sm-3 control-label" >
														Số điện thoại</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="txtSdt" placeholder="Số điện thoại" required />
													</div>
												</div>
												<div class="form-group">
													<label for="mobile" class="col-sm-3 control-label">
														Email</label>
													<div class="col-sm-9">
														<input type="email" class="form-control" name="txtEmail" data-validation="email" placeholder="Email" required/>
													</div>
												</div>
												<div class="form-group">
													<label for="mobile" class="col-sm-3 control-label">
														Ngày sinh</label>
													<div class="col-sm-9">
														<input type="date" class="form-control" name="date" required />
													</div>
												</div>
												<div class="form-group">
													<label for="mobile" class="col-sm-3 control-label">
														Địa chỉ</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="txtDiachi" placeholder="Địa chỉ" required/>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-2">
													</div>
													<div class="col-sm-10">
														<button type="submit" class="btn btn-primary btn-sm" style="color:white ;background-color: rgba(31,31,31,1.00)">
															Đăng ký</button>
														<button type="button" class="btn btn-default btn-sm">
															Hủy</button>
													</div>
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
																}
															});
												});
												</script>
												
											</div>
										</div>             
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } 
		if(isset($_SESSION["user"]))
		{
		?>
        <div class="admin" style="float: right">
						<div class="dropdown" style="margin-left:10px">
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background-color:rgba(57,57,57,1.00);height:35px;color: darkgrey;margin-right:5px">
							Xin chào <?php 
							$user=$_SESSION["user"];
							include ("ConnectDb/open.php");
							$sql="select ten from tbltaikhoan where user='$user'";
							$result=mysqli_query($con,$sql);
							$row=mysqli_fetch_array($result);
							echo $row["ten"];
							include ("ConnectDb/close.php");
							?>
							<span class="caret"></span>
							</button>
									<ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style="background-color: rgba(57,57,57,1.00)">
										<?php if($_SESSION["mapq"]==1 || $_SESSION["mapq"]==2) { ?> <li><a href="AdminPanel/giaodien.php" style="color: white;font-weight: bold">Admin Panel</a></li> <?php } ?>
										<li><a href="logout.php" style="color: darkgray">Đăng xuất</a></li>
										<li>
										<a href="#" data-toggle="modal" data-target="#myModalNorm" style="color: darkgray">
											Đổi mật khẩu
										</a>
										</li>
										<?php if($_SESSION["mapq"]==3) { ?> <li><a href="lichSuGiaoDich.php" style="color:darkgray">Lịch sử giao dịch</a></li> <?php } ?>
										
									</ul>
						</div>
					</div>
                    <?php } ?>
			<form method="get" action="products.php">
			<div class="input-group">
			<input type="text" name="page" value="0" style="display:none">
            <input type="text" class="form-control" placeholder="Tìm kiếm..." name="keyword" style="width: 200px;float: right;height: 35px"<?php if(isset($_GET['keyword']))
			{
			$key=$_GET['keyword'];
			?>
			value="<?php echo $key;?>"
			<?php
			}
				   ?>>
            <div class="input-group-btn">	
            <button class="btn btn-default" type="submit" style="height:35px"><i class="glyphicon glyphicon-search"></i></button>
				
            </div>
				</form>
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
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel" align="left">
                    Đổi mật khẩu
                </h4>
            </div>
            
            <!-- Modal Body -->
			<form role="form" method="post" action="changepassprocess.php" id="frmchangepass">
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
                      <input type="password" name="password" class="form-control"
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
				<!-- Validate SCRIPT-->
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
		</div>
		<div id="logo" align="center">
			<a href="index.php"><img src="Images/giaodien/store_1441607815_658.jpg" ></a>
		</div>
		<div id="navbar" >
		<nav class="navbar navbar-inverse">
  			<div class="container" style="height:48px">
   			 <ul class="list-inline text-center">
    			<li <?php if($activepage=="index") { ?>  style="background:black;padding-top:10px;padding-bottom:6px" <?php } ?> ><a href="index.php" class="btn btn-dark" style="font-weight: bold;color:darkgrey">Trang chủ</a></li>
     			<li>
					<div class="dropdown">
						<button class="dropbtn" <?php if($activepage=="products") { ?> style="background:black" <?php } ?> >Thương hiệu</button>
						<div class="dropdown-content" style="min-width:850px;left:-350px">
							<div class="col-sm-3">
						<?php
						include ("ConnectDb/open.php");
							$sqlbrand="select * from tblnsx";
							$resultbrand=mysqli_query($con,$sqlbrand);
							$dem=0;
							while($rowbrand=mysqli_fetch_array($resultbrand))
							{
							$dem++;
							$brand=$rowbrand['mansx'];
							?>
								<a href="products.php?brand=<?php echo $brand;?>&page=0" class="adropdown" <?php if(isset($_GET['brand'])) { if($_GET['brand']==$brand) { ?> style="background:black" <?php } } ?>><?php echo $rowbrand['tennsx']; ?></a>
							<?php
							if($dem==4)
								{
								?>
								</div>
								<div class="col-sm-3">
								<?php
								$dem=0;
								}
							}
							?>
							</div>
						  </div>
					</div>
				</li>
     			<li><div class="dropdown">
						<button class="dropbtn" <?php if($activepage=='category') { ?> style="background:black" <?php } ?>>Danh mục</button>
						<div class="dropdown-content" style="min-width:600px;left:-400px">
							<div class="col-sm-3">
							<h3 class="maincate">Áo</h3>
							<?php 
								$sqlcateao="select * from tbldanhmuc where madm like 'S%'";
								$resultcateao=mysqli_query($con,$sqlcateao);
								while($rowcateao=mysqli_fetch_array($resultcateao))
								{
									$cateao=$rowcateao['madm'];
									?>
									<a href="products.php?cate=<?php echo $cateao;?>&page=0" class="adropdown" <?php if(isset($_GET['cate'])) { if($_GET['cate']==$cateao) { ?> style="background:black" <?php } } ?>><?php echo $rowcateao['tendanhmuc']; ?></a>
									<?php
								}
							?>
							</div>
							<div class="col-sm-3">
							<h3 class="maincate">Quần</h3>
							<?php 
								$sqlcatequan="select * from tbldanhmuc where madm like 'P%'";
								$resultcatequan=mysqli_query($con,$sqlcatequan);
								while($rowcatequan=mysqli_fetch_array($resultcatequan))
								{
									$catequan=$rowcatequan['madm'];
									?>
									<a href="products.php?cate=<?php echo $catequan;?>&page=0" class="adropdown" <?php if(isset($_GET['cate'])) { if($_GET['cate']==$catequan) { ?> style="background:black" <?php } } ?>><?php echo $rowcatequan['tendanhmuc']; ?></a>
									<?php
								}
							?>
							</div>
							<div class="col-sm-3">
							<h3 class="maincate">Giày</h3>
							<?php 
								$sqlcategiay="select * from tbldanhmuc where madm like 'FW%'";
								$resultcategiay=mysqli_query($con,$sqlcategiay);
								while($rowcategiay=mysqli_fetch_array($resultcategiay))
								{
									$categiay=$rowcategiay['madm'];
									?>
									<a href="products.php?cate=<?php echo $categiay;?>&page=0" class="adropdown" <?php if(isset($_GET['cate'])) { if($_GET['cate']==$categiay) { ?> style="background:black" <?php } } ?>><?php echo $rowcategiay['tendanhmuc']; ?></a>
									<?php
								}
							?>
							</div>
							<div class="col-sm-3">
							<h3 class="maincate">Phụ kiện</h3>
							<?php 
								$sqlcatephukien="select * from tbldanhmuc where madm like 'A%'";
								$resultcatephukien=mysqli_query($con,$sqlcatephukien);
								while($rowcatephukien=mysqli_fetch_array($resultcatephukien))
								{
									$catephukien=$rowcatephukien['madm'];
									?>
									<a href="products.php?cate=<?php echo $catephukien;?>&page=0" class="adropdown" <?php if(isset($_GET['cate'])) { if($_GET['cate']==$catephukien) { ?> style="background:black" <?php } } ?>><?php echo $rowcatephukien['tendanhmuc']; ?></a>
									<?php
								}
								include ("ConnectDb/close.php");
							?>
							</div>
						  </div>
					</div></li>
   			 </ul>
 			</div>
		</nav>
		</div>
	</div>


</body>
</html>
