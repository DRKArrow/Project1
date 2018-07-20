<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script>
	function start()
	{
		var date= new Date();
		var thang= date.getMonth();
		var ngay= date.getDate();
		var nam= date.getFullYear();
		var result=thang+1;
		var fullngay= nam + "-" + result + "-" + ngay;
		document.getElementById('ngay').value = ngay;
		document.getElementById('thang').value = result;
		document.getElementById('nam').value = nam;
		document.getElementById('fullngay').value = fullngay;
		document.getElementById('result').value = result;
		document.getElementById('resultsm').submit();
	}
</script>
<style>
.hero-widget { text-align: center; padding-top: 20px; padding-bottom: 20px;min-height: 320px  }
.hero-widget .icon { display: block; font-size: 96px; line-height: 96px; margin-bottom: 10px; text-align: center; }
.hero-widget label { font-size: 17px; }
.hero-widget .options { margin-top: 10px; }
.athongke:hover{text-decoration:none}
#leftthongke{float:left;width:50%}
#rightthongke{float:right;width:50%}
</style>
</head>

<body <?php if(!isset($_POST['resultsm'])) { ?> onload="start()" <?php } ?>>
<?php  include ("../ConnectDb/open.php"); ?>
	<div class="container">
	<h1 style="font-weight: bold" align="center">Thống kê</h1>
	<div class="row" style="padding-top: 10px">
		<div class="col-sm-6">
    	    <div class="hero-widget well well-sm">
                <div class="icon">
                     <i class="glyphicon glyphicon-user"></i>
                </div>
                <div class="text">
                    <label class="text-muted"><a href="?page=3" target="_blank" class="athongke">Tổng số khách hàng: <span class="badge">
						<?php
							$result=mysqli_query($con,"select count(*) as tongsokhachhang from tbltaikhoan where mapq=3");
							$row=mysqli_fetch_array($result);
							echo $row['tongsokhachhang'];
						?>
						</span></a> </label>
                </div>
            </div>
		</div>
        <div class="col-sm-6">
            <div class="hero-widget well well-sm">
                <div class="icon">
                     <i class="glyphicon glyphicon-shopping-cart"></i>
                </div>
                <div class="text">
                    <label class="text-muted"><a href="?page=5" target="_blank" class="athongke">Tổng số hóa đơn: <span class="badge">
					<?php
						$result=mysqli_query($con,"select count(*) as sodonhang from tblhoadon");
						$row=mysqli_fetch_array($result);
						echo $row['sodonhang'];
					?>
					</span></a> 
					</label>
					<ul class="list-unstyled">
						<li><a href="?page=5&result=dangxuly" target="_blank" class="athongke">Đang xử lý: <span class="badge">
							<?php
								$result=mysqli_query($con,"select count(*) as hddxl from tblhoadon where tinhtrang=1");
								$row=mysqli_fetch_array($result);
								echo $row['hddxl'];
							?>
							</span></a></li>
						<li><a href="?page=5&result=danggiaohang" target="_blank" class="athongke">Đang giao hàng: <span class="badge">
							<?php
								$result=mysqli_query($con,"select count(*) as hddgh from tblhoadon where tinhtrang=2");
								$row=mysqli_fetch_array($result);
								echo $row['hddgh'];
							?>
							</span></a></li>
						<li><a href="?page=5&result=dagiaohang" target="_blank" class="athongke">Đã giao hàng: <span class="badge">
							<?php
								$result=mysqli_query($con,"select count(*) as hdddgh from tblhoadon where tinhtrang=3");
								$row=mysqli_fetch_array($result);
								echo $row['hdddgh'];
							?>
							</span></a></li>
						<li><a href="?page=5&result=huydonhang" target="_blank" class="athongke">Hóa đơn đã hủy: <span class="badge">
							<?php
								$result=mysqli_query($con,"select count(*) as hdhuy from tblhoadon where tinhtrang=4");
								$row=mysqli_fetch_array($result);
								echo $row['hdhuy'];
							?>
							</span></a></li>
					</ul>
                </div>
            </div>
    	</div>
        <div class="col-sm-12">
            <div class="hero-widget well well-sm">
            	<div id="leftthongke">
                    <div class="icon">
                         <i class="glyphicon glyphicon-stats"></i>
                    </div>
                    <div class="text">
                        <form method="post" id="resultsm">
                        <input type="text" style="display:none" id="result" name="resultsm">
                        <input type="text" style="display:none" id="ngay" name="ngaysm">
                        <input type="text" style="display:none" id="thang" name="thangsm">
                        <input type="text" style="display:none" id="nam" name="namsm">
                        <input type="text" style="display:none" id="fullngay" name="fullngaysm"></form>
                        <label class="text-muted">Doanh số trong tháng <?php if(isset($_POST['resultsm'])) { echo $_POST['resultsm']; } ?>: </label>
                       <?php if(isset($_POST['resultsm']))
                        {
                        ?>
                        <ul class="list-unstyled">
                        <?php
                            $thang=$_POST['resultsm'];
                            $sqlTHD="SELECT count(*) as tongHoaDon FROM tblhoadon WHERE MONTH(ngaydathang) = $thang";
                            $resultTHD=mysqli_query($con,$sqlTHD);
                            $rowTHD=mysqli_fetch_array($resultTHD);
                            $sqlDoanhThu="SELECT sum(soluong*gia) as tongDoanhThu FROM tblhoadon inner join tblhoadonchitiet on tblhoadon.mahd=tblhoadonchitiet.mahd inner join tblsanpham on tblhoadonchitiet.masp=tblsanpham.masp WHERE MONTH(tblhoadon.ngaydathang) = $thang";
                            $resultDoanhThu=mysqli_query($con,$sqlDoanhThu);
                            $rowDoanhThu=mysqli_fetch_array($resultDoanhThu);
                        ?>
                        <li>Tổng số hóa đơn: <span class="badge"><?php echo $rowTHD['tongHoaDon']; ?></span></li>
                        <li>Tổng doanh thu: <span class="badge"><?php echo (number_format($rowDoanhThu['tongDoanhThu'],0,",",".")); ?> VNĐ</span></li>
                        <li><span style="font-size:0.7em;color:darkgrey">* Doanh thu chưa tính các đơn hàng được giảm giá</span></li>
                        </ul>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div id="rightthongke">
                    <div class="icon">
                         <i class="glyphicon glyphicon-stats"></i>
                    </div>
                    <div class="text">
                        <label class="text-muted">Doanh số trong ngày <?php if(isset($_POST['fullngaysm']) && isset($_POST['ngaysm']) && isset($_POST['thangsm']) && isset($_POST['namsm'])) 
						{
							$ngay=$_POST['ngaysm'];
							$thang=$_POST['thangsm'];
							$nam=$_POST['namsm'];
							$fullngay=$ngay . "/" . $thang . "/" . $nam;
							echo $fullngay;
						} ?>: </label>
                       <?php if(isset($_POST['fullngaysm']))
                        {
                        ?>
                        <ul class="list-unstyled">
                        <?php
                            $ngay=$_POST['fullngaysm'];
                            $sqlTHD="SELECT count(*) as tongHoaDon FROM tblhoadon WHERE ngaydathang = '$ngay'";
                            $resultTHD=mysqli_query($con,$sqlTHD);
                            $rowTHD=mysqli_fetch_array($resultTHD);
                            $sqlDoanhThu="SELECT sum(soluong*gia) as tongDoanhThu FROM tblhoadon inner join tblhoadonchitiet on tblhoadon.mahd=tblhoadonchitiet.mahd inner join tblsanpham on tblhoadonchitiet.masp=tblsanpham.masp WHERE tblhoadon.ngaydathang = '$ngay'";
                            $resultDoanhThu=mysqli_query($con,$sqlDoanhThu);
                            $rowDoanhThu=mysqli_fetch_array($resultDoanhThu);
                        ?>
                        <li>Tổng số hóa đơn: <span class="badge"><?php echo $rowTHD['tongHoaDon']; ?></span></li>
                        <li>Tổng doanh thu: <span class="badge"><?php echo (number_format($rowDoanhThu['tongDoanhThu'],0,",",".")); ?> VNĐ</span></li>
                        <li><span style="font-size:0.7em;color:darkgrey">* Doanh thu chưa tính các đơn hàng được giảm giá</span></li>
                        </ul>
                        <?php
                        }
                        ?>
                    </div>
                </div>
			</div>
        </div>
	</div>
</div>
<?php  include ("../ConnectDb/close.php"); ?>
</body>
</html>