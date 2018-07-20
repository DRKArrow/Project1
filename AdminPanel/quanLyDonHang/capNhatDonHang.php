<?php
session_start();
if(isset($_POST["ddlTT"]) && isset($_GET['mahd']))
{
	$tt=$_POST['ddlTT'];
	$mahd=$_GET['mahd'];
	include ("../../ConnectDb/open.php");
	mysqli_query($con,"update tblhoadon set tinhtrang=$tt where mahd=$mahd");
	include ("../../ConnectDb/close.php");
	header("Location:../giaodien.php?page=5");	
}else
{
	header("Location:../giaodien.php");	
}
?>