<?php
	if(isset($_POST["txtMa"]) && isset($_POST["txtTen"]))
	{
		$ma=$_POST["txtMa"];
		$dm=$_POST["txtTen"];
		include("../../ConnectDb/open.php");		
		$checktontaima=mysqli_query($con,"select * from tbldanhmuc where madm='$ma'");
		$checktontaiten=mysqli_query($con,"select * from tbldanhmuc where tendanhmuc='$dm'");
		if(mysqli_num_rows($checktontaima)!=0)
		{
			include ("../../ConnectDb/close.php");
			header("Location: ../giaodien.php?page=6&err=ma");
		}
		else if(mysqli_num_rows($checktontaiten)!=0)
		{
			include ("../../ConnectDb/close.php");
			header("Location: ../giaodien.php?page=6&err=ten");
		}
		else
		{
			mysqli_query($con,"insert into tbldanhmuc values ('$ma','$dm')");
			include ("../../ConnectDb/close.php");
			header("location: ../giaodien.php?page=6&success=1");
		}
	}
	else header("location: quanLyDanhMuc.php");
?>