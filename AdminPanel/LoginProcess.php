<?php
session_start();
	if( isset($_POST["txtUser"]) && isset($_POST["txtPass"]) )
	{
		$user=$_POST["txtUser"];
		$pass=$_POST["txtPass"];
		include ("../ConnectDb/open.php");
		$result=mysqli_query($con,"select * from tbltaikhoan where user='$user' and pass='$pass' and mapq in(1,2)");
		$count=mysqli_num_rows($result);
		if($count==0)
		{
			header("Location: index.php?err=1");
		}
		else
		{
			$row=mysqli_fetch_array($result);
			$_SESSION["user"]=$row["user"];
			$_SESSION["mapq"]=$row["mapq"];
			header("Location: giaodien.php");
		}
		include ("../ConnectDb/close.php");
	}else header("Location: index.php");
?>