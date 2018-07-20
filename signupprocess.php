<?php
	if(isset($_POST["txtTen"]) && isset($_POST["txtUser"]) && isset($_POST["txtPass"]) && isset($_POST["txtEmail"]) && isset($_POST["date"]) && isset($_POST["ddlGt"]) && isset($_POST["txtDiachi"]) && isset($_POST["txtSdt"]))
	{
		$ten=$_POST["txtTen"];
		$user=$_POST["txtUser"];
		$pass=$_POST["txtPass"];
		$email=$_POST["txtEmail"];
		$ngaysinh=$_POST["date"];
		$gt=$_POST["ddlGt"];
		$diachi=$_POST["txtDiachi"];
		$sdt=$_POST["txtSdt"];
		include ("ConnectDb/open.php");
		$resultUser=mysqli_query($con,"select * from tbltaikhoan where user='$user'");
		if(mysqli_num_rows($resultUser)==0)
		{
			$resultmax=mysqli_query($con,"select max(matk) as maxMa from tbltaikhoan");
			$rowmax=mysqli_fetch_array($resultmax);		
			$maxma=$rowmax["maxMa"];
			$matk=$maxma+1;
			mysqli_query($con,"insert into tbltaikhoan values ($matk,'$user','$pass',3,'$ten','$ngaysinh','$diachi','$gt','$sdt','$email')");
			include ("ConnectDb/close.php");	
			header("Location: index.php?success=signup");	
		}
		else
		header("Location: index.php?err=signup");
	}else header("Location: index.php");
?>