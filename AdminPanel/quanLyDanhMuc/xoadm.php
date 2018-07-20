<?php
	if(isset($_GET["madm"]))
	{
		include("../../ConnectDb/open.php");	
		$ma=$_GET["madm"];
		$checktontai=mysqli_query($con,"select * from tbldanhmuc inner join tblsanpham on tbldanhmuc.madm=tblsanpham.madm where tbldanhmuc.madm='$ma'");
		if(mysqli_num_rows($checktontai)>0)
		{
			include("../../ConnectDb/close.php");	
			header("Location: ../giaodien.php?page=6&err=1");
		}
		else
		{
			mysqli_query($con,"delete from tbldanhmuc where madm='$ma'");
			include("../../ConnectDb/close.php");
			header("Location: ../giaodien.php?page=6&success=2");
		}
	}else header("Location: quanLyDanhMuc.php");
?>