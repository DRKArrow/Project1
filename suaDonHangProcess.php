<?php
if(isset($_GET['mahd']) && isset($_GET['masp']) && isset($_GET['action']))
{
	if($_GET['action']=='xoasp')
	{
		$mahd=$_GET['mahd'];
		$masp=$_GET['masp'];
		include ("ConnectDb/open.php");
		mysqli_query($con,"delete from tblhoadonchitiet where mahd=$mahd and masp='$masp'");	
		include ("ConnectDb/close.php");
		header("Location: suaDonHang.php?mahd=$mahd");
	}	
}
else if(isset($_GET['mahd']) && isset($_POST['txtSdt']) && isset($_POST['txtDiachi']) && isset($_POST['yeucau']))
{
	$mahd=$_GET['mahd'];
	$sdt=$_POST['txtSdt'];
	$diachi=$_POST['txtDiachi'];
	$yeucau=$_POST['yeucau'];
	include ("ConnectDb/open.php");
	mysqli_query($con,"update tblhoadon set sdtgiaohang='$sdt', diachigiaohang='$diachi', yeucau='$yeucau' where mahd=$mahd");
	include ("ConnectDb/close.php");
	header("Location: lichSuGiaoDich.php?success=scf");
}
else header("Location: lichSuGiaoDich.php");
?>