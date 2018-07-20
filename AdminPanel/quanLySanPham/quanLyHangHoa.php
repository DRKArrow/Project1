<?php
	session_start();
	if(!isset($_SESSION["user"]) || ($_SESSION["mapq"]==3) )
	{
		header("Location: ../index.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<a href="quanLyNsx/quanLynsx.php">Quan ly nha san xuat</a> 
<a href="quanLySanPham/quanLySanPham.php">Quan ly san pham</a> 
</body>
</html>
