<?php
session_start();
	if(isset($_POST["txtUser"]) && isset($_POST["txtPass"]))
	{
		$user=$_POST["txtUser"];
		$pass=$_POST["txtPass"];
		include ("ConnectDb/open.php");
		$result=mysqli_query($con,"select * from tbltaikhoan where user='$user' and pass='$pass'");
		$count=mysqli_num_rows($result);
		if($count==0)
		{
			if(count($_SESSION['gioHang'])>0)
			{
				header("Location: xemgiohang.php?err=errlogin");
			}
			else
			{
				header("Location: index.php?err=errlogin");
			}
		}
		else
		{
			$row=mysqli_fetch_array($result);
			$_SESSION["user"]=$row["user"];
			$_SESSION["mapq"]=$row["mapq"];
			if(count($_SESSION['gioHang'])>0)
			{
			header("Location: xemgiohang.php");
			}
			else
			{
			header("Location: index.php");
			}
		}
		include ("ConnectDb/close.php");
	}else header("Location: index.php");
?>