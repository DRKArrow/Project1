<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>

<title><?php
	
	include ("ConnectDb/open.php");
	$ma=$_GET["masp"];
		$sql="select * from tblsanpham inner join tblnsx on tblsanpham.mansx=tblnsx.mansx where masp='$ma'";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($result);
	echo $row['tennsx'] . " - " . $row['tensp'];?></title>
<style>
	#content{background:black;width:50%;margin:auto;height:100%;padding-top:20px;padding-bottom:50px}
	#background{background:black;width:100%;height:100%;min-height: 60vh}
	span{color:white;}
</style>
</head>

<body>
<?php
	if(isset($_GET["masp"]))
	{
		$activepage="products";
		include ("main/header.php");
		include ("ConnectDb/open.php");
	$ma=$_GET["masp"];
		$sql="select * from tblsanpham inner join tblnsx on tblsanpham.mansx=tblnsx.mansx where masp='$ma'";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($result);
		?>
	<div id="background">
		<div id="content">
        <table width="100%">
    	<tr>
        	<td rowspan="6" width="300px"><img src="<?php echo($row["anh"]);?>" height="500px"style="margin-right: 40px"/></td>
        </tr>
		<tr>
            <td style="height:10%"><span style="font-size:30px;font-weight:bolder"><?php echo($row["tennsx"]);?> </span><span> - <?php echo($row["masp"]);?></span></td>
        </tr>
        <tr>
        	
            <td><span style="font-weight:bold"><?php echo($row["tensp"]);?></span></td>
        </tr>
		 <tr>
        	
            <td><span style="font-size:12px;color:darkgrey"><pre style="background:black;border:0px;color:white"><?php echo($row["mota"]);?></span></pre></td>
        </tr>
        <tr>
            <td><span style="font-size:25px;font-weight:bold"><?php echo(number_format($row["gia"],0,",","."));?> VNĐ</span></td>
        </tr>
        <tr>
        	
            <td><span><?php if($row['tinhtrang']==1){ ?><a href="gioHang.php?maSp=<?php echo($row["masp"]);?>"><button class="btn btn-primary" type="submit" style="color: black;background-color: white;font-weight: bold">THÊM SẢN PHẨM VÀO GIỎ HÀNG</button></a> <?php } else { ?> <a href="products.php"><button class="btn btn-primary" type="button" style="color: black;background-color: white;font-weight: bold">SẢN PHẨM ĐÃ HẾT, BẠN VUI LÒNG CHỌN SẢN PHẨM KHÁC</button><?php } ?></a></span></td>
        </tr>
    </table>
		</div>
	</div>
		<?php
		include ("ConnectDb/close.php");
		?>
        <div id="footer">
        <?php
		include ("main/footer.php");
		?>
        </div>
        <?php	
	}else header("Location: index.php");
?>
</body>
</html>