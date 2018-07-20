<?php
	session_start();
	if(isset($_SESSION["user"]))
	{
		$user=$_SESSION["user"];
	}else header("Location: ../index.html");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
	<script>
		function validate()
		{
			var pass2=document.getElementById("pass2").value;
			var pass3=document.getElementById("pass3").value;
			var regPass=/^[a-zA-Z0-9]+$/
			var errpass1=document.getElementById("errpass1");
			var errpass2=document.getElementById("errpass2");
			var errpass3=document.getElementById("errpass3");
			var err=0;
			if(regPass.test(pass2)==false)
			{
				errpass2.innerHTML = " * Sai định dạng ! ";
				err=1;
			}
			else
			{
				errpass2.innerHTML = "";
			}
			if(pass3!=pass2)
			{
				errpass3.innerHTML = " * Nhập lại pass không khớp ! ";
				err=1;
			}else
			{
				errpass3.innerHTML = "";
			}
			if(err==1) return false;
			else return true;
		}
	</script>
</head>

<body>
	<form method="post" action="changepassprocess.php" onsubmit="return validate()">
	<table>
		<tr>
			<td align="right">Password:</td>
			<td><input type="password" name="txtPass" id="pass1"/></td>
			<td><span id="errpass1" name="err"><?php if(isset($_GET["err"])) { echo(" * Sai mật khẩu !"); }  ?></span></td>
		</tr>
		<tr>
			<td align="right">New Password:</td>
			<td><input type="password" name="txtNewPass" id="pass2"/></td>
			<td><span id="errpass2" name="err"></span></td>			
		</tr>
		<tr>
			<td align="right">Re-password:</td>
			<td><input type="password" id="pass3"/></td>
			<td><span id="errpass3" name="err"></span></td>			
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" value="Change Password"/></td>
		</tr>
	</table>
	</form>
</body>
</html>
