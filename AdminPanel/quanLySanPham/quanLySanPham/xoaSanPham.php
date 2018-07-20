<?php
	if(isset($_GET["masp"]))
	{
		$ma=$_GET["masp"];
		include("../../../ConnectDb/open.php");	
		$checktontai=mysqli_query($con,"select * from tblsanpham inner join tblhoadonchitiet on tblsanpham.masp=tblhoadonchitiet.masp where tblsanpham.masp='$ma'");
		if(mysqli_num_rows($checktontai)>0)
		{
			include("../../../ConnectDb/close.php");	
			header("Location: ../../giaodien.php?page=2&err=2");
		}
		else
		{
			mysqli_query($con,"delete from tblsanpham where masp='$ma'");
			include("../../../ConnectDb/close.php");	
			header("Location: ../../giaodien.php?page=2&success=1");
		}
	}else header("Location: ../../giaodien.php");
?>