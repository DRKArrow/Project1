<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
if(isset($_POST["txtPass"])&&isset($_POST["txtNewPass"]))
{
	$pass=$_POST["txtPass"];
	$newpass=$_POST["txtNewPass"];
	$user=$_SESSION["user"];
	include ("ConnectDb/open.php");
	$sql="select * from tbltaikhoan where user='$user' and pass='$pass'";
	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)==1)
	{
		mysqli_query($con,"update tbltaikhoan set pass='$newpass' where user='$user'");
	}else
	{
		if($_SESSION["mapq"]==1 || $_SESSION["mapq"]==2)
		{
			header("Location: AdminPanel/giaodien.php?err=errchangepass");
		}else { header("Location: index.php?err=errchangepass"); }
	}
	include ("ConnectDb/close.php");
	if($_SESSION["mapq"]==1 || $_SESSION["mapq"]==2)
	{
	?>
	<meta http-equiv="refresh" content="0,AdminPanel/giaodien.php?success=changepass" />
	<?php
	}
	else
	{
	?>
	<meta http-equiv="refresh" content="0,index.php?success=changepass" />
	<?php
	}
}else header("Location: index.php");
?>