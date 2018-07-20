<?php
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
if(isset($_SESSION["user"]) && isset($_SESSION["gioHang"]) && isset($_POST["sdt"]) && isset($_POST["diachi"]) && isset($_POST["yeucau"]))
{
	$user=$_SESSION["user"];
	$sdt=$_POST["sdt"];
	$diachi=$_POST["diachi"];
	$yeucau=$_POST["yeucau"];
	include("ConnectDb/open.php");
	$resultUser=mysqli_query($con,"select * from tbltaikhoan where user='$user'");
	$rowUser=mysqli_fetch_array($resultUser);
	//tao hoa don
	//lay mahd
	$sqlMaxMa="select max(mahd) as maxMa from tblhoadon";
	$resultMaxMa=mysqli_query($con,$sqlMaxMa);
	$rowMaxMa=mysqli_fetch_array($resultMaxMa);
	$maxMa=$rowMaxMa["maxMa"];
	$mahd=1;
	if($maxMa!='NULL')
	{
		$mahd=$maxMa+1;	
	}
	$matk=$rowUser["matk"];
	//insert
	mysqli_query($con,"insert into tblhoadon values($mahd,$matk,now(),'$sdt','$diachi','$yeucau',1)");
	//them vao don hang chi tiet
	$gioHang=$_SESSION["gioHang"];
	foreach($gioHang as $maSp=>$soLuong)
	{
		mysqli_query($con,"insert into tblhoadonchitiet values($mahd,'$maSp',$soLuong)");	
	}
	include("ConnectDb/close.php");
	unset($_SESSION["gioHang"]);
	header("Location:index.php?dathang=scf");
}else
{
	header("Location:index.php");
}
?>