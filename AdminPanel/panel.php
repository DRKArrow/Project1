<?php
	session_start();
	if(!isset($_SESSION["user"]) || ($_SESSION["mapq"]==3) )
	{
		header("Location: index.php");
	}
	else
	{
	?>
		<a href="../logout.php">Logout</a>
		<a href="../changepass.php">Change Password</a>
		<a href="quanLyTaiKhoan/quanLyKhachHang.php">Quan ly khach hang</a>
		<a href="quanLySanPham/quanLyHangHoa.php">Quan ly hang hoa</a>
	<meta http-equiv="Refresh" content="0,giaodien.php">
	<?php
	}
?>
