<?php
	if(isset($_POST["txtMa"]) && isset($_POST["txtTen"]))
	{
		$ma=$_POST["txtMa"];
		$nsx=$_POST["txtTen"];
		include("../../../ConnectDb/open.php");	
		$checktontaima=mysqli_query($con,"select * from tblnsx where mansx='$ma'");
		$checktontaiten=mysqli_query($con,"select * from tblnsx where tennsx='$nsx'");
		if(mysqli_num_rows($checktontaima)!=0)
		{
			include ("../../../ConnectDb/close.php");
			header("Location: ../../giaodien.php?page=1&err=ma");
		}
		else if(mysqli_num_rows($checktontaiten)!=0)
		{
			include ("../../../ConnectDb/close.php");
			header("Location: ../../giaodien.php?page=1&err=ten");
		}
		else
		{
			$gt='';
			if(isset($_POST['txtGt']))
			{
				$gt=$_POST['txtGt'];
			}
			mysqli_query($con,"insert into tblnsx values ('$ma','$nsx','$gt')");
			include ("../../../ConnectDb/close.php");
			header("location: ../../giaodien.php?page=1&success=1");
		}
	}
	else header("location: quanLynsx.php");
?>