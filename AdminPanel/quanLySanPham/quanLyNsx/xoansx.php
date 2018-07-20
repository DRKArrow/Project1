<?php
	if(isset($_GET["mansx"]))
	{
		include("../../../ConnectDb/open.php");	
		$ma=$_GET["mansx"];
		$checktontai=mysqli_query($con,"select * from tblnsx inner join tblsanpham on tblnsx.mansx=tblsanpham.mansx where tblnsx.mansx='$ma'");
		if(mysqli_num_rows($checktontai)>0)
		{
			include("../../../ConnectDb/close.php");	
			header("Location: ../../giaodien.php?page=1&err=1");
		}
		else
		{
			mysqli_query($con,"delete from tblnsx where mansx='$ma'");
			include("../../../ConnectDb/close.php");
			header("Location: ../../giaodien.php?page=1&success=2");
		}
	}else header("Location: quanLynsx.php");
?>