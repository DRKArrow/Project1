<?php
session_start();
if(isset($_POST["ddlSl"]) && isset($_GET['masp']) && isset($_GET['mahd']))
{
	$masp=$_GET['masp'];
	$sl=$_POST['ddlSl'];
	$mahd=$_GET['mahd'];
	include ("ConnectDb/open.php");
	mysqli_query($con,"update tblhoadonchitiet set soluong=$sl where mahd=$mahd and masp='$masp'");
	include ("ConnectDb/close.php");
	header("Location: suaDonHang.php?mahd=$mahd#form{$masp}");
}else
{
	header("Location: suaDonHang.php?mahd=$mahd");	
}
?>