<?php
	if(isset($_GET["mahd"]))
	{
		$ma=$_GET["mahd"];
		include("../../ConnectDb/open.php");	
		mysqli_query($con,"delete from tblhoadonchitiet where mahd='$ma'");
		mysqli_query($con,"delete from tblhoadon where mahd='$ma'");
		include("../../ConnectDb/close.php");	
		header("Location: ../giaodien.php?page=5&success=2");
	}else header("Location: ../giaodien.php");
?>