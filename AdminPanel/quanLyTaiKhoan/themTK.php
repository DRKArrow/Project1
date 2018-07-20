<?php
	if(isset($_POST["txtTen"]) && isset($_POST["txtUser"]) && isset($_POST["txtPass"]) && isset($_POST["txtEmail"]) && isset($_POST["date"]) && isset($_POST["rdbGt"]) && isset($_POST["txtDiachi"]) && isset($_POST["txtSdt"]))
	{
		$ten=$_POST["txtTen"];
		$user=$_POST["txtUser"];
		$pass=$_POST["txtPass"];
		$email=$_POST["txtEmail"];
		$ngaysinh=$_POST["date"];
		$gt=$_POST["rdbGt"];
		$diachi=$_POST["txtDiachi"];
		$sdt=$_POST["txtSdt"];
		$mapq=$_GET["mapq"];
		include ("../../ConnectDb/open.php");
		$checktontai=mysqli_query($con,"select * from tbltaikhoan where user='$user'");
		if(mysqli_num_rows($checktontai)!=0)
		{
			include ("../../ConnectDb/close.php");
			if($mapq==3)
			{
				header("Location: ../giaodien.php?page=3&err=1");
			}
			if($mapq==2)
			{
				header("Location: ../giaodien.php?page=4&err=1");
			}
		}
		else
		{
			$resultmax=mysqli_query($con,"select max(matk) as maxMa from tbltaikhoan");
			$rowmax=mysqli_fetch_array($resultmax);		
			$maxma=$rowmax["maxMa"];
			$matk=$maxma+1;
			mysqli_query($con,"insert into tbltaikhoan values ($matk,'$user','$pass',$mapq,'$ten','$ngaysinh','$diachi',$gt,'$sdt','$email')");
			include ("../../ConnectDb/close.php");	
			if($mapq==3)	header("Location: ../giaodien.php?page=3&success=1");
			if($mapq==2)	header("Location: ../giaodien.php?page=4&success=1");	
		}
	}else header("Location: ../giaodien.php");
?>
