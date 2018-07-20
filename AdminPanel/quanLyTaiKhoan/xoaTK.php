<?php
	if(!isset($_SESSION["user"]) || ($_SESSION["mapq"]==3) )
	{
		header("Location: ../../index.php");
	}
	if(!isset($_GET["page"]))
	{
		header("Location: ../giaodien.php");
	}
	if(isset($_GET["maTK"]))
	{
		$ma=$_GET["maTK"];
		$mapq=$_GET["mapq"];
		include ("../../ConnectDb/open.php");
		if($mapq==3)
		{
			mysqli_query($con,"delete from tblkhachhang where matk=$ma");
			mysqli_query($con,"delete from tbltaikhoan where matk=$ma");
		}else
		{
			mysqli_query($con,"delete from tbladmin where matk=$ma");
			mysqli_query($con,"delete from tbltaikhoan where matk=$ma");
		}
		include ("../../ConnectDb/close.php");		
		if($mapq==3)	header("Location: ../giaodien.php?page=3&success=2");
		if($mapq==2)	header("Location: ../giaodien.php?page=4&success=2");
	}else header("Location: ../giaodien.php");
?>