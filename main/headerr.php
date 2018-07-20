<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Untitled Document</title>
	<style>
		#header{width: 100%;height: 200px;background: rgba(0,0,0,1.00);}	
		#logo{width: auto;height: inherit;margin-top: 20px}
		#navbar{margin-top: -106px;}
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
		
	</style>
</head>

<body>
	<div id="header">
		<div class="nav navbar-static-top" align="right">
        <?php
		$activepage="index";
		if(!isset($_SESSION["user"]))
		{
			?>
			<div id="reg" style="float: right;margin-left: 20px;height:35px;color: aliceblue" >	
				<button class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="color: darkgray;background-color: rgba(57,57,57,1.00)">
    Login/Registration</button>
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
					aria-hidden="true" >
					<div class="modal-dialog modal-lg"  style="background-color: black;width: 700px;height: 300px" >
						<div class="modal-content"  style="background-color: black">
							<div class="modal-header"  style="background-color: black">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									×</button>
								<h4 class="modal-title" id="myModalLabel" style="color:darkgray;padding-right:30px">
									Login/Registration</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="c" style=";padding-right: 30px;">
										<!-- Nav tabs -->
										<ul class="nav nav-tabs">
											<li class="active"><a href="#Login" data-toggle="tab">Login</a></li>
											<li><a href="#Registration" data-toggle="tab">Registration</a></li>
										</ul>
										<!-- Tab panes -->
										<div class="tab-content">
											<div class="tab-pane active" id="Login">
												<form method="post" action="loginprocess.php" class="form-horizontal" style="padding-top: 10px">
												<div class="form-group">
													<label for="Username" class="col-sm-2 control-label">
														Username</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" name="txtUser" placeholder="Username" />
													</div>
												</div>
												<div class="form-group">
													<label for="Password" class="col-sm-2 control-label">
														Password</label>
													<div class="col-sm-10">
														<input type="password" class="form-control" name="txtPass" placeholder="Password" />
													</div>
												</div>
												<div class="row">
													<div class="col-sm-2">
													</div>
													<div class="col-sm-10">
														<button type="submit" class="btn btn-primary btn-sm" style="color:white ;background-color: rgba(31,31,31,1.00)">
															Submit</button>
														<a href="javascript:;">Forgot your password?</a>
													</div>
												</div>
												</form>
											</div>
											<div class="tab-pane" id="Registration">
												<form method="post" action="signupprocess.php" class="form-horizontal" style="padding-top: 10px">
												<div class="form-group">
													<label for="email" class="col-sm-2 control-label">
														Name</label>
													<div class="col-sm-10">
														<div class="row">
															<div class="col-md-3">
																<select class="form-control" name="ddlGt">
																	<option value="1">Mr.</option>
																	<option value="0">Ms.</option>
																	<option value="0">Mrs.</option>
																</select>
															</div>
															<div class="col-md-9">
																<input type="text" class="form-control" name="txtTen" placeholder="Name" />
															</div>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label for="email" class="col-sm-2 control-label">
														Username</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" name="txtUser" placeholder="Username" />
													</div>
												</div>
												<div class="form-group">
													<label for="password" class="col-sm-2 control-label">
														Password</label>
													<div class="col-sm-10">
														<input type="password" class="form-control" name="txtPass" placeholder="Password" />
													</div>
												</div>
												<div class="form-group">
													<label for="mobile" class="col-sm-2 control-label">
														Mobile</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" name="txtSdt" placeholder="Mobile" />
													</div>
												</div>
												<div class="form-group">
													<label for="mobile" class="col-sm-2 control-label">
														Email</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" name="txtEmail" placeholder="Email" />
													</div>
												</div>
												<div class="form-group">
													<label for="mobile" class="col-sm-2 control-label">
														Date of Birth</label>
													<div class="col-sm-10">
														<input type="date" class="form-control" name="date"/>
													</div>
												</div>
												<div class="form-group">
													<label for="mobile" class="col-sm-2 control-label">
														Address</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" name="txtDiachi" placeholder="Address" />
													</div>
												</div>
												<div class="row">
													<div class="col-sm-2">
													</div>
													<div class="col-sm-10">
														<button type="submit" class="btn btn-primary btn-sm" style="color:white ;background-color: rgba(31,31,31,1.00)">
															Registration</button>
														<button type="button" class="btn btn-default btn-sm">
															Cancel</button>
													</div>
												</div>
												</form>
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
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background-color:rgba(57,57,57,1.00);height:35px;color: darkgrey">
							Xin chào <?php 
							$user=$_SESSION["user"];
							include ("../ConnectDb/open.php");
							if($_SESSION["mapq"]==3)
							{
								$sql="select tenkh from tblkhachhang inner join tbltaikhoan on tblkhachhang.matk=tbltaikhoan.matk where user='$user'";
								$result=mysqli_query($con,$sql);
								$row=mysqli_fetch_array($result);
								echo $row["tenkh"];
							}
							else
							{
								$sql="select tenad from tbladmin inner join tbltaikhoan on tbladmin.matk=tbltaikhoan.matk where user='$user'";
								$result=mysqli_query($con,$sql);
								$row=mysqli_fetch_array($result);
								echo $row["tenad"];
							}
							include ("../ConnectDb/close.php");
							?>
							<span class="caret"></span>
							</button>
									<ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style="background-color: rgba(57,57,57,1.00)">
										<li><a href="logout.php" style="color: darkgray">Logout</a></li>
										<li>
										<a href="#" data-toggle="modal" data-target="#myModalNorm" style="color: darkgray">
											Change password
										</a>
										</li>
										<?php if($_SESSION["mapq"]==1 || $_SESSION["mapq"]==2) { ?> <li><a href="AdminPanel/giaodien.php" style="color: darkgray">Admin Panel</a></li> <?php } ?>
									</ul>
						</div>
					</div>
                    <?php } ?>
			<form method="get" action="products.php">
			<div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="keyword" style="width: 200px;float: right;height: 35px">
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
                    Change password
                </h4>
            </div>
            
            <!-- Modal Body -->
			<form role="form" method="post" action="changepassprocess.php">
				<div class="modal-body">
                  <div class="form-group">
                    <label for="cp">Current password</label>
                      <input type="password" class="form-control"
                      name="txtPass"/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">New password</label>
                      <input type="password" class="form-control"
                          name="txtNewPass"/>
                  </div>
					<div class="form-group">
                    <label for="exampleInputPassword1">Repeat password</label>
                      <input type="password" class="form-control"
                      	/>
                  </div>

            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Close
                </button>
                <button type="submit" class="btn btn-primary" >
                    Save changes
                </button>
            </div>
				</form>
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
    			<li <?php if($activepage=="index") { ?>  style="background:black;padding-top:10px;padding-bottom:6px" <?php } ?> ><a href="index.php" class="btn btn-dark" style="font-weight: bold">Home</a></li>
     			<li>
					<div class="dropdown">
						<button class="dropbtn" <?php if($activepage=="products") { ?> style="background:black" <?php } ?> >Brands</button>
						<div class="dropdown-content" style="min-width:800px;left:-270px">
							<div class="col-sm-3">
						<?php
						include ("../ConnectDb/open.php");
							$sqlbrand="select * from tblnsx";
							$resultbrand=mysqli_query($con,$sqlbrand);
							$dem=0;
							while($rowbrand=mysqli_fetch_array($resultbrand))
							{
							$dem++;
							$brand=$rowbrand['mansx'];
							?>
								<a href="products.php?brand=<?php echo $rowbrand['mansx'];?>" class="adropdown" <?php if(isset($_GET['brand'])) { if($_GET['brand']=='$brand') { ?> style="background:black" <?php } } ?>><?php echo $rowbrand['tennsx']; ?></a>
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
						include ("../ConnectDb/close.php");
							?>
							</div>
						  </div>
					</div>
				</li>
     			<li><div class="dropdown">
						<button class="dropbtn">Category</button>
						<div class="dropdown-content" style="min-width:100px">
							<div id="c1" class="col-ms-2">
							<a href="#">Link 1</a>
							<a href="#">Link 2</a>
							<a href="#">Link 3</a>
							</div>
						  </div>
					</div></li>
     			<li><div class="dropdown">
						<button class="dropbtn">New Arrival</button>
						<div class="dropdown-content" style="min-width:100px">
							<div id="c1" class="col-ms-2">
							<a href="#">Link 1</a>
							<a href="#">Link 2</a>
							<a href="#">Link 3</a>
							</div>
						  </div>
					</div></li>
   			 </ul>
 			</div>
		</nav>
		</div>
	</div>
	
	<?php if (isset($_GET['err']))  
	{
	if($_GET['err']=="errlogin")
		{
			$errlogin="Tài khoản hoặc mật khẩu không tồn tại !";
			print '<script type="text/javascript">alert("' . $errlogin . '");</script>';
		}
	if($_GET['err']=="errchangepass")
		{
			$errchangepass="Sai mật khẩu !";
			print '<script type="text/javascript">alert("' . $errchangepass . '");</script>';
		}
	} ?>


</body>
</html>
