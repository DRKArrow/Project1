<?php
session_start();
	if(isset($_GET["maSp"]))
	{
		$maSp=$_GET["maSp"];
		if(isset($_SESSION["gioHang"]))
		{
			//khong phai lan dau tien
			//da ton tai gio hang tren bo nho ss
			if(isset($_SESSION["gioHang"][$maSp]))//da ton tai san pham tren trong gio hang
			{
				$_SESSION["gioHang"][$maSp]++;	
			}else
			{
				$_SESSION["gioHang"][$maSp]=1;//chua ton tai
			}
			
		}else
		{
			//lan dau tien bam vao them san pham vao gio hang thi phai tao gio hang
			//gio hang nam tren bo nho ss
			$_SESSION["gioHang"]=array();
			//nem san pham tren vao gio hang
			$_SESSION["gioHang"][$maSp]=1;
		}
		header("Location:products.php");
	}else
	{
		header("Location: index.php");	
	}
?>