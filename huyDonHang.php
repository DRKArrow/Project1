<?php
session_start();
if(!isset($_SESSION["user"]))
{
	header("Location: index.php");
}
else
{
	if(isset($_GET['mahd']))
	{
		$mahd=$_GET['mahd'];
		include ("ConnectDb/open.php");
		mysqli_query($con,"update tblhoadon set tinhtrang=4 where mahd=$mahd");
		include ("ConnectDb/close.php");
		header("Location: lichSuGiaoDich.php");
	}
	else
	{
		header("Location: lichSuGiaoDich.php");
	}
}
?>