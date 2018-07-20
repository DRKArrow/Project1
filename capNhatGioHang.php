<?php
session_start();
if(isset($_POST["arrSl"]))
{
	//lay so luong ve
	$arrSl=array();
	$arrSl=$_POST["arrSl"];	
	//lay gio hang ve
	$gioHang=array();
	$gioHang=$_SESSION["gioHang"];
	$dem=0;
	foreach($gioHang as $maSp=>$soLuong)
	{
		//cap nhat
		$_SESSION["gioHang"][$maSp]=$arrSl[$dem];
		$dem++;	
	}
	header("Location:xemGioHang.php");	
}else
{
	header("Location:xemGioHang.php");	
}
?>